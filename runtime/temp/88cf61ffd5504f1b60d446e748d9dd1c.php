<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:96:"/Users/iimt/Development/PHP/corrosion/public/../application/admin/view/organization/addCate.html";i:1543993230;s:79:"/Users/iimt/Development/PHP/corrosion/application/admin/view/public/header.html";i:1544172502;s:79:"/Users/iimt/Development/PHP/corrosion/application/admin/view/public/footer.html";i:1541774126;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php echo $pageTitle; ?> - 管理后台</title>
  <link rel="stylesheet" href="/vendor/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/static/admin/css/font-awesome.min.css">
  <script src="/static/admin/js/jquery.min.js"></script>
  <script src="/vendor/layui/layui.js"></script>
  <script src="/static/admin/custom/js/router.js"></script>
  <script>
    $(document).ready(e => {
      resetNav()
      //页面载入时，获取页面地址，设置当前tab
      let url = window.location.pathname
      console.log(url)

      let tabs = $(".layui-nav-item dd")
      console.log(tabs)
      let status = 0
      for (var i = 0; i < tabs.length; i++) {
        let tab = $(tabs[i])
        if (url.indexOf(tab.data('url')) != -1) {
          tab.addClass("layui-this")
          $(tab).parent().parent().addClass("layui-nav-itemed")
          status = 1
          break
        }
      }

      if (status == 0) {
        $("#default-itemed").addClass("layui-nav-itemed")
      }

      $("dd").click(e => {
        let url = e.currentTarget.dataset.url
        this.router.push(url)
      })
    })

    function resetNav() {
      let moreSpanTemplate = "<span class='layui-nav-more'></span>"
      let moreSpanClass = ".layui-nav-more"
      //删除默认的三角标
      $(moreSpanClass).empty()

      let oneNav = $(".nav-one")
      for (var i = 0; i < oneNav.length; i++) {
        let aOneNav = $(oneNav[i])
        let parent = aOneNav.parent()
        if (parent.hasClass("layui-nav-itemed")) {
          aOneNav.prepend(moreSpanTemplate)
        } else {
          aOneNav.append(moreSpanTemplate)
        }
      }
      oneNav.click(function () {
        let that = $(this)
        let parent = that.parent()
        if (parent.hasClass("layui-nav-itemed")) {
          that.find(".layui-nav-more").remove()
          that.append(moreSpanTemplate)
          parent.removeClass("layui-nav-itemed")
        } else {
          that.prepend(moreSpanTemplate)
          parent.addClass("layui-nav-itemed")
        }
      })
    }
  </script>
</head>

<body class="layui-layout-body">
  <div class="layui-layout layui-layout-admin">
    <div class="layui-header">
      <div class="layui-logo"><a href="<?php echo url('admin/index/index'); ?>"><img class="logo" src="/static/admin/images/admin_logo.png"
            alt=""></a></div>
      <!-- 头部区域（可配合layui已有的水平导航） -->
      <ul class="layui-nav layui-layout-left">
        <li class="layui-nav-item"><a href="/admin">控制台</a></li>
        <!-- <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li> -->
      </ul>
      <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item"><a href="<?php echo url('/'); ?>" target="_blank">前台首页</a></li>
        <li class="layui-nav-item">
          <a href="javascript:;">
            <!-- <img src="/static/admin/images/login-header.png" class="layui-nav-img"> -->
          </a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo url('admin/Messager/resetPass'); ?>">修改密码</a></dd>
            <dd><a href="">基本信息</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="<?php echo url('admin/login/logout'); ?>">退出</a></li>
      </ul>
    </div>

    <div class="layui-side layui-bg-black">
      <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree" lay-filter="test">
          <li class="layui-nav-item" id="default-itemed">
            <a href="javascript:;" class="nav-one">管理员</a>
            <dl class="layui-nav-child">
              <dd data-url='/messager/index'><a>管理员列表</a></dd>
              <dd data-url='/messager/add'><a>添加管理员</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;" class="nav-one">用户管理</a>
            <dl class="layui-nav-child">
              <dd data-url='/userinfo/index'><a>用户列表</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;" class="nav-one">用户消息</a>
            <dl class="layui-nav-child">
              <dd data-url='/touser/index'><a>发送消息</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;" class="nav-one">文章管理</a>
            <dl class="layui-nav-child">
              <dd data-url='/article/index'><a href="/admin/article/index">查看文章</a></dd>
              <dd data-url='/article/add'><a>发布文章</a></dd>
              <dd data-url='/focus/index'><a>科技焦点管理</a></dd>
              <dd data-url='/select/index'><a>每周精选管理</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;" class="nav-one">文章分类管理</a>
            <dl class="layui-nav-child">
              <dd data-url='/acate/index'><a>查看分类</a></dd>
              <dd data-url='/acate/add'><a>添加分类</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;" class="nav-one">基础数据管理</a>
            <dl class="layui-nav-child">
              <dd data-url='/bdcate/index'><a>查看数据分类</a></dd>
              <dd data-url='/bdcate/add'><a>添加数据分类</a></dd>
              <dd data-url='/bdata/index'><a>查看数据</a></dd>
              <dd data-url='/bdata/add'><a>添加数据</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;" class="nav-one">室内数据管理</a>
            <dl class="layui-nav-child">
              <dd data-url='/indoordata/index'><a>查看数据</a></dd>
              <dd data-url='/indoordata/add'><a>添加数据</a></dd>
              <dd data-url='/data/addIndoor'><a>添加数据源</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;" class="nav-one">野外数据管理</a>
            <dl class="layui-nav-child">
              <dd data-url='/wilddata/index'><a>查看数据</a></dd>
              <dd data-url='/wilddata/add'><a>添加数据</a></dd>
              <dd data-url='/data/addWild'><a>添加数据源</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;" class="nav-one">室内/野外数据分类管理</a>
            <dl class="layui-nav-child">
              <dd data-url='/dcate/index?type=1'><a>查看室内分类</a></dd>
              <dd data-url='/dcate/index?type=2'><a>查看室外分类</a></dd>
              <dd data-url='/dcate/add'><a>添加分类</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;" class="nav-one">标准管理</a>
            <dl class="layui-nav-child">
              <dd data-url='/scate/index'><a>查看分类</a></dd>
              <dd data-url='/scate/add'><a>添加分类</a></dd>
              <dd data-url='/standard/index'><a>查看标准</a></dd>
              <dd data-url='/standard/add'><a>添加标准</a></dd>
              <dd data-url='/standard/import'><a>导入标准</a></dd>
            </dl>
					</li>
					<li class="layui-nav-item">
						<a href="javascript:;" class="nav-one">会议管理</a>
						<dl class="layui-nav-child">
							<dd data-url='/conference/index'><a>会议列表</a></dd>
							<dd data-url='/conference/add'><a>添加会议</a></dd>
							<dd data-url='/conference/addbanner'><a>添加图片</a></dd>
							<dd data-url='/organization/index'><a>会议涉及组织</a></dd>
							<dd data-url='/organization/addorg'><a>添加会议组织</a></dd>
							<dd data-url='/organization/cate'><a>会议组织分类</a></dd>
							<dd data-url='/organization/addCate'><a>添加组织分类</a></dd>
							<dd data-url='/enlist/index'><a>报名中心</a></dd>
						</dl>
					</li>
          <li class="layui-nav-item">
            <a href="javascript:;" class="nav-one">平台简介管理</a>
            <dl class="layui-nav-child">
              <dd data-url='/about/desc'><a>中心简介</a></dd>
              <dd data-url='/about/pro'><a>专家介绍</a></dd>
              <dd data-url='/about/example'><a>工程应用案例</a></dd>
              <dd data-url='/about/unit'><a>组织机构</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item">
            <a href="javascript:;" class="nav-one">站点设置</a>
            <dl class="layui-nav-child">
              <dd data-url='/site/info'><a>基础设置</a></dd>
              <dd data-url='/site/carousel'><a>幻灯片</a></dd>
              <dd data-url='/site/nav'><a>导航设置</a></dd>
              <dd data-url='/site/friends'><a>友情链接</a></dd>
              <dd data-url='/site/footer'><a>页脚管理</a></dd>
            </dl>
          </li>
        </ul>
      </div>
    </div>
<!-- 内容主体区域 -->
<div class="layui-body">
	<div style="padding: 15px;">
		<h3>添加分类</h3>
		<form style="margin-top:50px;" class="layui-form" action="?" method="post">
			<div class="layui-form-item">
				<label class="layui-form-label">选择分类标识</label>
				<div class="layui-input-block">
					<select name="remark" lay-verify="required">
						<option value=""></option>
						<option value="media">media</option>
						<option value="unit">unit</option>
					</select>
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">分类名称</label>
				<div class="layui-input-block">
					<input type="text" name="name" placeholder="组织名称" required lay-verify="required" autocomplete="off" class="layui-input">
					<input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
				</div>
			</div>

			<div class="layui-form-item">
				<div class="layui-input-block">
					<button id="submit" class="layui-btn" lay-submit lay-filter="formDemo">增加</button>
				</div>
			</div>
		</form>
	</div>

</div>

<script src="/vendor/layui/layui.js"></script>
<script src="/vendor/js/jquery-3.0.0.js"></script>
<script type="text/javascript">
	layui.use('form', function () {
		var form = layui.form;
	});

	layui.use(["layer"], function () {
		var layer = layui.layer;
	})

</script>

<div class="layui-footer">
  <!-- 底部固定区域 -->
  <p>2016 &copy; <a href="https://github.com/xiayulei/think_admin" target="_blank">Think Admin</a></p>
</div>
</div>
</body>

<script>
  // $(document).ready(e => {
  //   //JavaScript代码区域
  //   layui.use('element', function () {
  //     var element = layui.element;
  //   });
  // })
</script>

</html>