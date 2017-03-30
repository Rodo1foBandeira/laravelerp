<?php

namespace App\Http\Controllers;

use App\Neighborhood;
use App\Country;
use App\Entity;
use App\CategoriesEntity;
use App\EntityCategory;
use App\Phone;
use App\Email;
use App\Http\Requests\EntityRequest;
use App\PostalCode;
use App\State;
use App\City;

class EntityController extends Controller
{
    // EntityCategory = categoria(s) de entidade
    // Ex: [{"id":1,"category":"Cliente"},{"id":2,"category":"Fornecedor"}]

    // CategoriesEntity = entidade->categorias (Relacionamentos)
    // Ex: [{"entity_id":1,"category_id":1},{"entity_id":1,"category_id":2}]

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entities = Entity::with('phones','categoriesEntities.entityCategory')->get();
		
        return view('entity.index',compact('entities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EntityCategory::all();
        $countries = Country::pluck('country','id');
        $states = State::where('country_id',1)->pluck('state','id')->sortBy('state');
        $cities = City::where('state_id',1)->pluck('city','id')->sortBy('city');
        $postalCodes = PostalCode::where('city_id',1)->pluck('code','id')->sortBy('code');
        $neighborhoods = Neighborhood::pluck('neighborhood','id')->sortBy('neighborhood');
        return view('entity.create',compact('categories','countries','states','cities','postalCodes','neighborhoods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntityRequest $request)
    {
        $entity = Entity::create($request->all());

        $categories = EntityCategory::all();

        foreach ($categories as $category){
            if ($request->get($category->eckey)==$category->id){
                CategoriesEntity::create(['entity_id'=>$entity->id,'category_id'=>$category->id]);
            }
        }

        for ($i=1; $i <= $request->get('countPhones'); $i++){
            if ($request->get('phone'.$i)){
                Phone::create(['entity_id'=>$entity->id,'number'=>$request->get('phone'.$i),'pnotes'=>$request->get('pnotes'.$i)]);
            }
        }

        for ($i=1; $i <= $request->get('countEmails'); $i++){
            if ($request->get('email'.$i)){
                Email::create(['entity_id'=>$entity->id,'email'=>$request->get('email'.$i),'enotes'=>$request->get('enotes'.$i)]);
            }
        }

        return redirect('entity');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entity = Entity::with('categoriesEntities','phones','emails')->find($id);

        $categoriesEntity = array();
        foreach ($entity->categoriesEntities as $category){
            array_push($categoriesEntity,$category->category_id);
        }

        $categories = EntityCategory::all();
        $countries = Country::pluck('country','id');
        $postalCode = PostalCode::with('city.state.country')->find($entity->postal_code_id);
        $states = State::where('country_id',$postalCode->city->state->country->id)->pluck('state','id')->sortBy('state');
        $cities = City::where('state_id',$postalCode->city->state->id)->pluck('city','id')->sortBy('city');
        $postalCodes = PostalCode::where('city_id',$postalCode->city->id)->pluck('code','id')->sortBy('code');
        $neighborhoods = Neighborhood::pluck('neighborhood','id')->sortBy('neighborhood');

        return view('entity.edit',compact('entity','categories','categoriesEntity','countries','states','cities','postalCodes','postalCode','neighborhoods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EntityRequest $request, $id)
    {
        $entity = Entity::find($id)->fill($request->all());
        $entity->update();

        $categoriesEntities = CategoriesEntity::where('entity_id',$id)->get();

        $categories = array();
        foreach ($categoriesEntities as $category){
            array_push($categories,$category->category_id);
        }

        $categoriesEntities = $categories;
        $categories = EntityCategory::all();

        foreach ($categories as $category){
            if ($request->get($category->eckey)==$category->id){
                if (! in_array($category->id,$categoriesEntities))
                    CategoriesEntity::create(['entity_id'=>$id,'category_id'=>$category->id]);
            }else{
                CategoriesEntity::where(['entity_id'=>$id,'category_id'=>$category->id])->delete();
            }
        }

        for ($i = 0; $i <= $request->get('countPhones'); $i++){
            if ($request->get('phid'.$i)){
                if ($request->get('phone'.$i) == 'null'){
                    Phone::find($request->get('phid'.$i))->delete();
                }else{
                    $phone = Phone::find($request->get('phid'.$i));
                    if (($phone->number !== $request->get('phone'.$i)) || ($phone->pnotes !== $request->get('pnotes'.$i))){
                        $phone->number = $request->get('phone'.$i);
                        $phone->pnotes = $request->get('pnotes'.$i);
                        $phone->save();
                    }
                }
            }elseif ($request->get('phone'.$i)){
                Phone::create(['entity_id'=>$entity->id,'number'=>$request->get('phone'.$i),'pnotes'=>$request->get('pnotes'.$i)]);
            }
        }

        for ($i = 0; $i <= $request->get('countEmails'); $i++){
            if ($request->get('emid'.$i)){
                if ($request->get('email'.$i) == 'null'){
                    Email::find($request->get('emid'.$i))->delete();
                }else{
                    $email = Email::find($request->get('emid'.$i));
                    if (($email->email !== $request->get('email'.$i)) || ($email->enotes !== $request->get('enotes'.$i))){
                        $email->email = $request->get('email'.$i);
                        $email->enotes = $request->get('enotes'.$i);
                        $email->save();
                    }
                }
            }elseif ($request->get('email'.$i)){
                Email::create(['entity_id'=>$entity->id,'email'=>$request->get('email'.$i),'enotes'=>$request->get('enotes'.$i)]);
            }
        }

        return redirect('entity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoriesEntity::where(['entity_id'=>$id])->delete();
        Phone::where(['entity_id'=>$id])->delete();
        Email::where(['entity_id'=>$id])->delete();

        Entity::find($id)->delete();

        return redirect('entity');
    }
}
