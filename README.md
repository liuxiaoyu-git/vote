# Prize-Wheel

1)oc new-project prize-wheel

2)部署一个mysql oc new-app mysql-ephemeral --name mysql -p MYSQL_USER=openshift -p MYSQL_PASSWORD=password -p MYSQL_ROOT_PASSWORD=password -p MYSQL_DATABASE=sampledb

3)创建表

mysql -h127.0.0.1 -P3306 -uopenshift -ppassword
use sampledb;
drop table winner;
create table winner (username varchar(20) primary key,prizetype varchar(20));

4)创建应用和相关route oc new-app https://github.com/liuxiaoyu-git/Prize-Wheel --name=prize-wheel --env MYSQL_SERVICE_HOST=mysql.lucky-draw.svc MYSQL_SERVICE_PORT=3306 DATABASE_NAME=sampledb DATABASE_USER=openshift DATABASE_PASSWORD=password

oc expose svc prize-wheel

