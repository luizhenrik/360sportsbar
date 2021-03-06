<!-- 
/*
 * ***********************************************
 * Objetivo:     Listagem de Segmentos
 
 *               
 * Created on :  25/02/2014
 * Author     :  Naelson Matheus Jr
 * 
 * ***********************************************
 * Updates
 * 
 * Created on :  DD/MM/YYYY
 * Author     :  
 * Description:  
 * 
 */
-->


<div id="paging_container" class="container">

    <!-- BOTÃO INSERIR -->
    <a class="cp" onclick="objSegmentos.fnOpenFormInsert();" >Inserir</a>

    <br/>

    <ul class="content w100p">
        <li>ID</li>
        <li><span class="name_user">Titulo</span></li>
        <li>Ativo</li>
    </ul>

    <hr/>

    <!-- the input fields that will hold the variables we will use -->  
    <input type='hidden' id='current_page' />  
    <input type='hidden' id='show_per_page' /> 

    <!-- Content div. The child elements will be used for paginating(they don't have to be all the same,  
        you can use divs, paragraphs, spans, or whatever you like mixed together). '-->  
    <div id='content'>  


        <?php
        /* INSTANCIA O OBJETO USUÁRIOS - LISTAGEM */
        $segmento = Segmentos::listar();

        /* CASO HAJA REGISTRO */
        if ($segmento > 0 && $segmento != false)
        /* PARA CADA REGISTRO, É POPULADO OS DADOS */
            foreach ($segmento as $s):

                /* VARIAVIES */
                $id_segmento = $s['id_segmento'];
                $titulo = $s['titulo'];
                $breve_descr = $s['breve_descr'];
                $cor = $s['cor'];
                $img = $s['img'];
                $descricao = $s['descricao'];
                $ativo = $s['ativo'] == 1 ? 'Sim' : 'Não';

                /* LINHA - REGISTRO */
                echo "<p><ul class='content'>  ";
                echo "  <li>" . $id_segmento . "  </li>";
                echo "  <li><span class='name_user'>" . $titulo . "</span></li>";
                echo "  <li>" . $ativo . "</li>";

                /* BTN EDITAR & REMOVER */
                echo "  <li>    <a class='cp' onclick='objSegmentos.fnOpenFormEdit($id_segmento);' >Editar</a> "
                . "             <a class='cp' onclick='objSegmentos.fnDelete($id_segmento);' >Deletar</a> </li>";

                /* INFO OCULTA DO USUÁRIO P/ O CASO "EDITAR" */
                echo "  <li> <input type=\"hidden\" id=\"hddSegmento$id_segmento\" "
                . "value='{ "
                . "          \"titulo\": \"$titulo\", "
                . "          \"breve_descr\": \"$breve_descr\", "
                . "          \"cor\": \"$cor\", "
                . "          \"img\": \"$img\", "
                //. "          \"descricao\": \"" . html_entity_decode($descricao) . "\", "
                . "          \"ativo\": \"" . $s['ativo'] . "\" "
                . "     }' />"
                . "         <input type='hidden' id='hddTxtAreaDescricao$id_segmento' value='$descricao' /> "
                . "         <input type='hidden' id='hddImg$id_segmento' value='$img' /> "
                . "</li>";
                echo "</ul></p>";

                echo "<br/>";

            endforeach;
        else
            echo "<p>Lista Vazia!</p>";
        ?>

    </div>

    <!-- An empty div which will be populated using jQuery -->  
    <div id='page_navigation'></div>  

</div>