# Vote

1)创建项目

```
oc new-project vote
```

2)部署一个mysql 

```
oc new-app mysql-persistent --name mysql -p MYSQL_USER=openshift -p MYSQL_PASSWORD=password -p MYSQL_ROOT_PASSWORD=password -p MYSQL_DATABASE=demodb
```

3)创建表

```
oc rsh $(oc get pods --output=jsonpath={.items[0].metadata.name} --field-selector status.phase=Running)
mysql -h127.0.0.1 -P3306 -uopenshift -ppassword
use demodb;
drop table vote;
create table vote (vote_item varchar(20));
insert into vote values('red');
insert into vote values('red');
insert into vote values('red');
insert into vote values('green');
insert into vote values('green');
select vote_item, count(vote_item) from vote group by vote_item;
```

4)创建应用和相关route 

```
oc new-app https://github.com/liuxiaoyu-git/vote --name=vote --env MYSQL_SERVICE_HOST=mysql.vote.svc MYSQL_SERVICE_PORT=3306 DATABASE_NAME=demodb DATABASE_USER=openshift DATABASE_PASSWORD=password

oc expose svc vote
```


其他见https://github.com/liuxiaoyu-git/Gold-Miner-Game/blob/master/README.md
