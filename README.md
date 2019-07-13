个人博客源码

>安装使用

## 复制配置文件
`cp .env.example .env`

`cp .babelsr.example .babelsr`

## 安装后端package

`composer install`

## 安装APP_KEY

`php artisan key:generate`

## 创建软连接

`php artisan storage:link`

## 迁移数据库

`php artisan migrate`

## 安装 laravel-admin 及 extension

`php artisan admin:install`

`php artisan vendor:publish --tag=laravel-admin-simplemde`

`php artisan admin:import media-manager`

## 安装前端package

`npm install` 或者 `yarn`

## 编译前端资源
`yarn production` 或者 `npm run production`
