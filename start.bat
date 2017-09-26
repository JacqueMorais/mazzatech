for /f "delims=[] tokens=2" %%a in ('ping %computername% -4 -n 1 ^| findstr "["') do (set thisip=%%a)

cmd /c start http://%thisip%:8082
php -S %thisip%:8082 -t public
:Continue
pause