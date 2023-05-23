@IF EXIST "%~dp0\node.exe" (
  "%~dp0\node.exe"  "%~dp0\..\caniuse-api\node_modules\update-browserslist-db\cli.js" %*
) ELSE (
  @SETLOCAL
  @SET PATHEXT=%PATHEXT:;.JS;=;%
  node  "%~dp0\..\caniuse-api\node_modules\update-browserslist-db\cli.js" %*
)