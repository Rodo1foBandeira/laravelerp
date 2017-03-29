net use X: \\DESKTOP-DI1MVVC\htdocs
xcopy X:\erp\*.* C:\xampp\htdocs\erp /Y
xcopy X:\erp\app\*.* C:\xampp\htdocs\erp\app /Y
xcopy /E X:\erp\app\Http\Controllers\*.* C:\xampp\htdocs\erp\app\Http\Controllers /Y
xcopy /E X:\erp\app\Http\Requests\*.* C:\xampp\htdocs\erp\app\Http\Requests /Y
xcopy X:\erp\database\migrations\*.* C:\xampp\htdocs\erp\database\migrations /Y
xcopy /E X:\erp\public\js\*.* C:\xampp\htdocs\erp\public\js /Y
xcopy /E X:\erp\public\css\*.* C:\xampp\htdocs\erp\public\css /Y
xcopy /E X:\erp\resources\views\*.* C:\xampp\htdocs\erp\resources\views /Y
xcopy X:\erp\routes\web.php C:\xampp\htdocs\erp\routes /Y