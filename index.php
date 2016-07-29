<!DOCTYPE html>

<html>
    <head>        
        <meta charset="UTF-8">        
        <script src="jquery.js" type="text/javascript"></script>
        <title>InfoVoluntário</title>
        <style>
            body {
                font-family: Verdana;
            }
        </style>
    </head>
    <body>
        <h3 style="color:Gray; font-weight: normal;">
            InfoVoluntário
        </h3>
        
        <fieldset>
            <legend>Usuários cadastrados</legend>
            
            <div id="lista_usuarios"></div>                    
        </fieldset>
        
        
        <fieldset>
            <legend>Cadastro de usuários</legend>
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input id="campo_nome" /></td>
                </tr>
                <tr>
                    <td>Sobrenome:</td>
                    <td><input id="campo_sobrenome" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="button" id="bt_cadastrar_usuario" value="Enviar" />
                    </td>
                </tr>
            </table>
        </fieldset>        
        
        <script type="text/javascript">
            
            listarUsuarios();
            
            function listarUsuarios( ) {
                
                $.post('ws_pesquisar.php', {}, 
                    function(data){      
                        $('#lista_usuarios').text('');                        
                        $table = document.createElement("table");                                                
                        $.each(data, function(idx, obj) {  
                            $linha = document.createElement("tr");
                            $col1 = document.createElement("td");
                            $col2 = document.createElement("td");                            
                            $col1.innerHTML = obj.nome;
                            $col2.innerHTML = obj.sobrenome;
                            $linha.appendChild($col1);
                            $linha.appendChild($col2);
                            $table.appendChild($linha);
                        });
                        $('#lista_usuarios').append($table);
                });
            }   
            
            $('#bt_cadastrar_usuario').click(function(){                                 
                $.post('ws_cadastro_usuario.php', 
                { 
                    nome: $('#campo_nome').val(), 
                    sobrenome: $('#campo_sobrenome').val()
                },                
                    function(data){
                        if ( data === "1" )
                            alert('Usuário cadastrado');
                        listarUsuarios();
                });
            });
        </script>
    </body>
</html>
