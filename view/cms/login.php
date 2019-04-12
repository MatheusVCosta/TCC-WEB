
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/cms/css/home_cms.css">
    <link rel="stylesheet" href="view/cms/css/login.css">
    <script src="view/cms/js/jquery.js"></script>
    <script src="view/cms/js/script_menu.js"></script>
    <script src="view/cms/js/script_CRUD.js"></script>
    <script src="view/cms/js/notify.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>CMS-Mos'share</title>
</head>
<body>
    <div class="principal">
        <div id="container">
            <div class="login_painel">
                <form id="frmLogar" class="login_painel_form" onsubmit="return logar(this)">
                    <div class="login_painel_form_legend"> Login </div>
                    <table>
                        <tr>
                            <td><label>E-mail:</label></td>
                        </tr>
                        <tr>
                            <td><input maxlength="100" type="email" pattern="^([a-z._\-0-9áéíóúàèìòùâêîôûãẽĩõũç]*@+([a-z0-9]+.+[a-z0-9])*)+$" name="txtEmail" required></td>
                        </tr>
                        <tr>
                            <td><label>Senha:</label></td>
                        </tr>
                        <tr>
                            <td><input name="txtSenha" required></td>
                        </tr>
                        <tr>
                            <td>
                                <button>Logar</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>