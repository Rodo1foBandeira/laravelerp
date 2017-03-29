net use X: \\DESKTOP-DI1MVVC\htdocs
xcopy C:\xampp\htdocs\erp\*.* X:\erp /Y
xcopy C:\xampp\htdocs\erp\app\*.* X:\erp\app /Y
xcopy /E C:\xampp\htdocs\erp\app\Http\Controllers\*.* X:\erp\app\Http\Controllers /Y
xcopy /E C:\xampp\htdocs\erp\app\Http\Requests\*.* X:\erp\app\Http\Requests /Y
xcopy C:\xampp\htdocs\erp\database\migrations\*.* X:\erp\database\migrations /Y
xcopy /E C:\xampp\htdocs\erp\public\js\*.* X:\erp\public\js /Y
xcopy /E C:\xampp\htdocs\erp\public\css\*.* X:\erp\public\css /Y
xcopy /E C:\xampp\htdocs\erp\resources\views\*.* X:\erp\resources\views /Y
xcopy C:\xampp\htdocs\erp\routes\web.php X:\erp\routes /Y