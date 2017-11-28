#!/bin/bash

#间隔的秒数，就是要几秒执行一次

#不能大于60
step=1 


for (( i = 0; i < 60; i=(i+step) )); do

$(php '/home/wwwroot/api.go-qxd.com/public/linux/callback.php')
sleep $step
done

exit 0
