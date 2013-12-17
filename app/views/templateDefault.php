
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
        <link rel="shortcut icon" href="/web-files/style/img/visualizar.ico" type="image/x-icon"> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>        
        <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

        <link type="text/css" href="/web-files/style/css/base.css" rel="stylesheet" />
        <link type="text/css" href="/web-files/style/css/home.css" rel="stylesheet" />
        <link type="text/css" href="/web-files/style/css/op.css" rel="stylesheet" />


        <title>SISTEMA PAPAGAIO VERDADEIRO</title>

    </head>
    <body>
        <div class="container">
            <div class="bar">
                <div id="sisname">
                    Sistema Papagaio Verdadeiro
                </div>
                <div id="user" >
                    <?php echo $_SESSION['nom']; ?>
                    <a href="/index/deslogar">Log Out</a>
                </div>
            </div>
            <div id="header"></div>
            <div id="home"><a href="/index">HOME</a></div>
            <div id="menu">