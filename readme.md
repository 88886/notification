## Notification

#### 配置：

运行`composer install`

配置crontab：

运行`crontab -e`

````
* * * * * php /site/artisan task:check
* * * * * sleep 10; php /site/artisan task:check
* * * * * sleep 20; php /site/artisan task:check
* * * * * sleep 30; php /site/artisan task:check
* * * * * sleep 40; php /site/artisan task:check
* * * * * sleep 50; php /site/artisan task:check
10 0 * * * chmod 777 -R /site/storage/logs
* * * * * sleep 50; php /site/artisan payment:check
````

supervisor配置文件：
````
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /site/artisan queue:work redis --sleep=3 --tries=3
autostart=true
autorestart=true
user=root
numprocs=10
redirect_stderr=true
stdout_logfile= /var/log/supervisor/supervisord.log
````

#### 错误代码

`1001` 管理员权限错误

`1002` 任务操作权限错误

`1003` 订单操作没有权限

`1004` 没有找到订单