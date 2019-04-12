<link rel="stylesheet" type="text/css" href="view/cms/css/email_marketing.css">
<div class="segura_text_button">
    <h2>Tabelas de emails</h2>
    <!-- <button class="adicionar_nivel" id="abrir_cadastro">ADICIONAR NÍVEL</button> -->
</div>
<div class="segura_tabela_email">  
    <div class="tabela">
        <div class="linha_titulo">
            <p style="width:150px;" class="col_text">
                SELECIONE
            </p>
            <p style="width:848px; border-left: 1px solid black;" class="col_text">
               EMAIL
            </p>
        </div>
        <div class="tabela_dados">
            <?php 
            
                for($i = 0; $i <=50; $i++){

                
            ?>
            <div class="linha_dados">
                <p style="width:150px;" class="col_text">
                    <!-- <form action=""> -->

                        <input type="checkbox" value="teste">
                    <!-- </form> -->
                </p>
                <p style="width:848px; border-left: 1px solid black;" class="col_text">
                    Teste@gmail.comsssssssssssssss
                </p>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
   
</div>
<button class="btn_exportar">Exportar</button>
