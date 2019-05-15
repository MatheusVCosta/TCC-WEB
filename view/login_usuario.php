
<link rel="stylesheet" type="text/css" media="screen" href="view/css/login_modal.css"></link>
<div class="caixa_login">
    <img src="view/imagem/login.png" alt="login" title="login" class="login">
    <img src="view/imagem/close_login.png" alt="close login" title="fechar login" class="closeLogin" onclick="closeLogin()">
			<div class="caixa_login">

				<div class="formulario_login">
					<h2>Efetuar login</h2>
					<form id="frmLogar"  onsubmit="return logar(this)" action="router.php?controller=clientes&modo=logar">
						<input maxlength="100" type="email" pattern="^([a-z._\-0-9áéíóúàèìòùâêîôûãẽĩõũç]*@+([a-z0-9]+.+[a-z0-9])*)+$" name="email" placeholder="Email" required>
						<input type="password" name="senha" placeholder="Senha" required><br>
						<input type="submit" value="Login">

						<p class="opcaoCadastro" style="margin-top: 10px;">Não tem cadastro ainda?</p>
						<p class="opcaoCadastro"> Clique <a href="#">AQUI</a> e crie sua conta!</p>
					</form>
				   
				</div>
			</div>
    </div>
</div>

