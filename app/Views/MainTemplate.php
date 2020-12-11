<html lang="en">
    <head>
        		<meta charset="UTF-8">
		<meta name="generator" content="ZnetDK 2.2 (http://www.znetdk.fr)">
        <title>ZnetDK demo</title>
    <link rel="icon" type="image/png" href="/applications/default/public/images/mylogo_en.png">
    <link rel="stylesheet" type="text/css" href="ci4\UI\primeui-all.css">

    <script src="..\ci4\UI\primeelements.js"></script>
    <script src="ci4\UI\primeui-all.js"></script>
	
    </head>
    <body class="ui-widget">
        <div id="zdk-messages"></div><div id="zdk-critical-err"></div>
        <span id="zdk-network-error-msg" class="ui-helper-hidden">Network error|Check your network connection and try again.</span>
        <img class="ui-helper-hidden" src="/resources/images/messages.png">
        <div id="banner" class="ui-state-active ui-corner-all">
            <table>
                <tbody>
                    <tr>
                        <td id="banner_left">
                            <a id="zdk-header-logo" href="#"><img id="banner_logo" src="/applications/default/public/images/mylogo_en.png" alt="banner logo" /></a>
                        </td>
                        <td id="banner_middle">
                            <h1>Demonstration of ZnetDK</h1>
                            <h2>Application ready for development...</h2>
                        </td>
                        <td id="banner_right">
                            <div id="zdk-connection-area" data-zdk-login="znetdk" data-zdk-username="Demo user"
                                 data-zdk-usermail="contact@znetdk.fr" data-zdk-changepwd="Password" >
                                <a id="zdk-profile" href="#"><img src="/engine/public/images/profile.png" alt="profile"/>znetdk</a>
                                <a id="zdk-logout" href="#"><img src="/engine/public/images/logout.png" alt="logout"/>Logout</a>
                            </div>
    <div id="zdk-language-area">
        <form action="/index.php">
            <img src="/engine/public/images/lang_flag_en.png" alt="English" />
            <select name="lang" style="width:94px;"></select>
        </form>
    </div>
    <script type="text/javascript">
        $(function () {
            var countries = new Array({label:'English', value:'en', icon:'engine/public/images/lang_flag_en.png'},{label:'Español', value:'es', icon:'engine/public/images/lang_flag_es.png'},{label:'Français', value:'fr', icon:'engine/public/images/lang_flag_fr.png'});
            $('#zdk-language-area select').puidropdown({
                data: countries,
                content: function (option) {
                    return '<img id="zdk-language-area-img" src="/' + option.icon + '" alt="' + option.label + '" /><span id="zdk-language-area-label">' + option.label + '</span>';
                },
                change: function (e) {
                    var selected_lang = $(this).val();
                    if (selected_lang !== 'en') {
                        $('#zdk-language-area > form').submit();
                    }
                }
            });
            $('#zdk-language-area select').puidropdown('selectValue', 'en');
        });
    </script>
                                <div id="zdk-help-area" data-zdk-helptitle="Online help - " data-zdk-helpclosebutton="Close">
                                <a href="#"><img src="/engine/public/images/help.png" alt="help"/>Help</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="content">
			<div id="zdk-classic-menu">
				<ul>
					<li><a href="#home">Home</a></li>
					<li><a href="#_themes">Themes</a></li>
					<li><a href="#_democrud">CRUD demo</a></li>
					<li><a href="#_demoform">FORM demo</a></li>
					<li><a href="#_authorization">Authorizations</a></li>
				</ul>
				<div>
					<div id="menu-home">
						<div class='tab_panel' title="Home">
							<div class="zdk-dynamic-content"></div>
						</div>
					</div>
					<div id="menu-_themes">
						<div class="zdk-classic-menu-level2">
							<ul>
								<li><a href="#try_themes">Themes</a></li>
								<li><a href="#check_widgets">Example</a></li>
							</ul>
							<div>
								<div id="menu-try_themes">
										<div class="zdk-dynamic-content"></div>
								</div>
								<div id="menu-check_widgets">
										<div class="zdk-dynamic-content"></div>
								</div>
							</div>
						</div>
					</div>
					<div id="menu-_democrud">
						<div class="zdk-classic-menu-level2">
							<ul>
								<li><a href="#democrud">CRUD demonstration</a></li>
								<li><a href="#crudsourcecode">CRUD source code</a></li>
							</ul>
							<div>
								<div id="menu-democrud">
										<div class="zdk-dynamic-content"></div>
								</div>
								<div id="menu-crudsourcecode">
										<div class="zdk-dynamic-content"></div>
								</div>
							</div>
						</div>
					</div>
					<div id="menu-_demoform">
						<div class="zdk-classic-menu-level2">
							<ul>
								<li><a href="#demoform">ZnetDK form</a></li>
								<li><a href="#demoformval">Form's messages</a></li>
								<li><a href="#demorbgroup">Radio buttons group</a></li>
								<li><a href="#demoloadata">Remote data</a></li>
								<li><a href="#demoautocomplete">Autocompletion</a></li>
								<li><a href="#demoupload">File upload</a></li>
								<li><a href="#demoserverside">Server-side validation</a></li>
							</ul>
							<div>
								<div id="menu-demoform">
										<div class="zdk-dynamic-content"></div>
								</div>
								<div id="menu-demoformval">
										<div class="zdk-dynamic-content"></div>
								</div>
								<div id="menu-demorbgroup">
										<div class="zdk-dynamic-content"></div>
								</div>
								<div id="menu-demoloadata">
										<div class="zdk-dynamic-content"></div>
								</div>
								<div id="menu-demoautocomplete">
										<div class="zdk-dynamic-content"></div>
								</div>
								<div id="menu-demoupload">
										<div class="zdk-dynamic-content"></div>
								</div>
								<div id="menu-demoserverside">
										<div class="zdk-dynamic-content"></div>
								</div>
							</div>
						</div>
					</div>
					<div id="menu-_authorization">
						<div class="zdk-classic-menu-level2">
							<ul>
								<li><a href="#users">Users</a></li>
								<li><a href="#profiles">Profiles</a></li>
							</ul>
							<div>
								<div id="menu-users">
										<div class="zdk-dynamic-content"></div>
								</div>
								<div id="menu-profiles">
										<div class="zdk-dynamic-content"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="default_content" class="ui-widget ui-widget-content ui-corner-all ui-helper-hidden"></div>
            <div id="footer" class="ui-state-active ui-corner-all">
                <table>
                    <tbody>
                        <tr>
                            <td id="footer_left">Version 2.2</td>
                            <td id="footer_middle">Copyright 2014-2020 <a href="http://www.pmclogiciels.fr" target="_blank">PMC Logiciels</a></td>
                            <td id="footer_right">Realized with <a href="http://www.znetdk.fr" target="_blank">ZnetDK</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <img id="zdk-ajax-loading-img" class="ui-helper-hidden" src="/engine/public/images/ajax-loader.gif" alt="ajax loader"/>
    </body>
</html>