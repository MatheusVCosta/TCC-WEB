
<form id="frmLogar"  onsubmit="return logar(this)" action="router.php?controller=clientes&modo=logar">
   
   <div class="login-caixa" style="background-color: #000; width: auto; height: auto; position: absolute;  margin-left: -27px;  margin-top: 17px;   color: white; border-radius: 0px 0px 11px 11px;   padding: 7px; ">
            <table>
                <tbody>
                    <tr>
                        <td> <label> E-mail </label> </td>
                    </tr>
                    <tr>
                        <td> <input maxlength="100" type="email" pattern="^([a-z._\-0-9áéíóúàèìòùâêîôûãẽĩõũç]*@+([a-z0-9]+.+[a-z0-9])*)+$" name="email" required></td>
                    </tr>
                    <tr>
                        <td><lable>Senha</lable></td>
                    </tr>
                    <tr>
                        <td><input type="senha" name="senha" required></td>
                    </tr>
                    <tr>
                        <td>
                            <button style="color: azure">Logar</button>
                        </td>
                    </tr>
                </tbody>
           </table>
      </div>
</form>
