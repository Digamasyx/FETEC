@echo off
title Update

git init

git add *

git commit -m "Auto Update"

git push

@pause

if errorlevel 0 taskkill /f /fi "WINDOWTITLE eq Update"