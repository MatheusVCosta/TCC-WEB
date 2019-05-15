<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>painel_usuario-Home</title>

        <!-- import dos arquivos scripts -->
        <script src="view/painel_usuario/js/jquery.js"></script>
        <script src="view/painel_usuario/js/notify.js"></script>
        <script src="view/painel_usuario/js/jqueryform.js"></script>
        <script src="view/painel_usuario/js/script_crud.js"></script>
        
        <link rel="stylesheet"  type="text/css" href="view/painel_usuario/css/cadastro.css"/>
        <link rel="stylesheet"  type="text/css" href="view/painel_usuario/css/home.css"/>
    </head>
    <body>
        <form id="frmCliente"  method='post' enctype="multipart/form-data" onsubmit="clientes_cadastrar(this)" action="router.php?controller=clientes&modo=inserir">
            <div class="titulo"> Cadastrar Usuario </div>
            <fieldset>
                <legend> Dados Basicos </legend>
                <table>
                    <tr>
                        <td>
                            <label>Nome</label>
                        </td>
                    </tr>
                    <tr>
                       <td>
                            <input type="text" name="nome" required>
                       </td>
                    </tr>
                    <tr>
                       <td>
                           <table> 
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td><label> CPF: </label></td>
                                            </tr>
                                            <tr>
                                                <td><input placeholder="482.271.062-14" name="cpf" required></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td><label>TELEFONE:</label></td>
                                            </tr>
                                            <tr>
                                                <td><input placeholder="(11)4325-5874" name="telefone" required></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td><label>CELULAR:</label></td>
                                            </tr>
                                            <tr>
                                                <td><input placeholder="(11)95684-5478" name="celular" required></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                           </table>
                         <td>
                    </tr>
                    <tr>
                        <td>
                            <label>EMAIL:</label>
                        </td>
                    </tr>
                    <tr>
                       <td>
                            <input type="text" placeholder="gil@paulo.com" name="email" required>
                       </td>
                    </tr>
                    <tr>
                        <td>
                            <label>SENHA:</label>
                        </td>
                    </tr>
                    <tr>
                       <td>
                            <input type="password" name="senha" required>
                       </td>
                    </tr>
                 </table>
            </fieldset>

            <fieldset>
                <legend> Endereço </legend>
                <table>
                    <tr>
                       <table> 
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td><label> CEP: </label></td>
                                        </tr>
                                        <tr>
                                            <td><input placeholder="06258-120" name="cep" required></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td><label> Cidade:</label></td>
                                        </tr>
                                        <tr>
                                            <td><input placeholder="Barueri" name="cidade" required></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td><label> UF:</label></td>
                                        </tr>
                                        <tr>
                                            <td><input placeholder="SP" name="uf" maxlength="2" required></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                       </table>
                    </tr>
                    <tr>
                       <table> 
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td><label> Logradouro: </label></td>
                                        </tr>
                                        <tr>
                                            <td><input name="rua" required></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td><label>Completmento:</label></td>
                                        </tr>
                                        <tr>
                                            <td><input name="complemento" required></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td><label>Bairro:</label></td>
                                        </tr>
                                        <tr>
                                            <td><input name="bairro" required></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                       </table>
                    </tr>
                 </table>
            </fieldset>

            <fieldset>
                <legend> Locação </legend>
                <table>
                    <tr>
                        <td>
                            <h4>FOTO</h4>
                            <div class="imagem_foto"></div>
                            <input type="file" name="fotoCliente" onchange="mostraImagem64(this)" accept="image/png, image/jpeg, image/jpg" required>
                        </td>
                        <td>
                            <h4>Foto CNH</h4>
                            <div class="imagem_foto"></div>
                            <input type="file" name="fotoCNH" onchange="mostraImagem64(this)" accept="image/png, image/jpeg, image/jpg" required>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <button>Salvar</button>
        </form>
    </body>
</html>