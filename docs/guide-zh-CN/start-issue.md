## 常见问题

目录

- 出现 vendor/bower/jquery/dist 找不到的解决方案
- 访问项目样式全部加载不到失调
- 配置成功后首页访问正常，其他页面访问报404错误
- 为什么访问gii访问不到报错
- 访问微信应用 出现 redirect_url 参数错误
- 小程序Post提交服务器无法接收到数据
- Windows环境打开后台微信报错

#### 出现 vendor/bower/jquery/dist 找不到的解决方案

执行以下代码

```
composer global require "fxp/composer-asset-plugin:^1.4.0"
```

#### 访问项目样式全部加载不到失调

由于是未设置站点，请配置站点到根目录的web下

#### 配置成功后首页访问正常，其他页面访问报404错误

请配置对应的伪静态配置

#### 为什么访问gii访问不到报错

请在后面加 .html 后缀, 注意线上的环境屏蔽了gii，如果想开启请自行百度

#### 访问微信应用 出现 redirect_url 参数错误

这是由于程序使用了网页授权而公众号没有正确配置【网页授权域名】所致。此时你需要登录微信公众平台，在【开发】->【接口权限】页面找到网页授权获取用户基本信息进行配置并保存。

- 网页授权域名应该为通过 ICP 备案的有效域名，否则保存时无法通过安全监测。
- 网页授权域名即程序完成授权获得授权 code 后跳转到的页面的域名，一般情况下为你的业务域名。
- 网页授权域名配置成功后会立即生效。
- 公众号的网页授权域名只可配置一个，请合理规划你的业务，否则你会发现……授权域名不够用哈。

#### 小程序Post提交服务器无法接收到数据

$_POST 只能接收 Content-Type 为 application/x-www-form-urlencoded 和 multipart/form-data 的 POST 数据。

如果你要用 $_POST 的话，你就改一下这里：

```
header: {
              'Content-Type': 'application/json'
 }
```

把上面的 application/json 改成 application/x-www-form-urlencoded (如果要上传文件的话就改成 multipart/form-data，但是微信小程序里的上传文件用的是另外一个 API，具体的你可以仔细看一下文档)。

#### Windows环境打开后台微信报错

注意查看[环境搭建](start-environment.md)的Windows微信环境配置