<form onsubmit="anuncios_pendentes_aprovar(this)" action="router.php?controller=anuncios&modo=aprovar&id_anuncio=<?=@$_GET['id_anuncio']?>">
    <table style="background-color:white; padding:7px;">
        <tr>
            <td>Deixe uma menssagem sobre a aprovação</td>
        </tr>
        <tr>
            <td>
                <textarea placeholder="Descrição" name="motivo" class="veiculos_pendentes_caixa_desc" required></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <button class="veiculos_pendentes_btn">Aprovar</button>    
            </td>
        </tr>
    </table>
</form>
<style>
textarea.veiculos_pendentes_caixa_desc{
    border: solid 1px #e8e8e8;
    min-width: 99%;
    resize: none;
    min-height: 91px;
    padding-top: 4px;
    margin-top: 6px;
    width: 374px;
    padding-left: 10px;
    background-color: white;
}
button.veiculos_pendentes_btn{
    padding: 2px 6px;
    background-color: white;
    border: solid 1px #ccc;
    margin: 3px;
    font-size: 1.2em;
}
button.veiculos_pendentes_btn:hover{
    color: #3a8c10;
}
</style>