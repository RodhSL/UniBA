<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Busca</title>
</head>
<body>
    <h1>Instituições</h1>
    <?php

include "Conexão.php";

$pesquisar = $_POST['pesquisar'];
$resposta_tipo = $_POST['tipoEnsino'];
$resposta_curso = $_POST['cursos'];
$resposta_cidade = $_POST['cidades'];

// echo $resposta_curso;

if(!empty($_POST['pesquisar']) and !empty($_POST['tipoEnsino']) and !empty($_POST['cidades']) and !empty($_POST['cursos'])){

  $result = "SELECT * FROM instituicao JOIN inst_curso ON SIGLA_inst = SIGLA JOIN curso ON codCurso = id_curso WHERE nomeInst LIKE '%".$pesquisar."%' AND tipoEnsino = '$resposta_tipo' AND municipio = '$resposta_cidade' AND codCurso = '$resposta_curso' AND codCurso = '$resposta_curso'";
    
} elseif(!empty($_POST['pesquisar'] and !empty($_POST['tipoEnsino'])) and !empty($_POST['cursos'])) {
    
    $result = "SELECT * FROM instituicao JOIN inst_curso ON SIGLA_inst = SIGLA JOIN curso ON codCurso = id_curso WHERE nomeInst LIKE '%".$pesquisar."%' AND tipoEnsino = '$resposta_tipo' AND codCurso = '$resposta_curso'";

} elseif(!empty($_POST['pesquisar'] and !empty($_POST['tipoEnsino'])) and !empty($_POST['cidades'])) {
    
    $result = "SELECT DISTINCT * FROM instituicao WHERE nomeInst LIKE '%".$pesquisar."%' AND tipoEnsino = '$resposta_tipo' AND municipio = '$resposta_cidade'";

} elseif(!empty($_POST['pesquisar'] and !empty($_POST['cursos'])) and !empty($_POST['cidades'])) {
    
    $result = "SELECT * FROM instituicao JOIN inst_curso ON SIGLA_inst = SIGLA JOIN curso ON codCurso = id_curso WHERE nomeInst LIKE '%".$pesquisar."%' AND codCurso = '$resposta_curso' AND municipio = '$resposta_cidade'";

} elseif(!empty($_POST['tipoEnsino'] and !empty($_POST['cursos'])) and !empty($_POST['cidades'])) {
    
    $result = "SELECT * FROM instituicao JOIN inst_curso ON SIGLA_inst = SIGLA JOIN curso ON codCurso = id_curso WHERE tipoEnsino = '$resposta_tipo' AND codCurso = '$resposta_curso' AND municipio = '$resposta_cidade'";

} elseif(!empty($_POST['pesquisar'] and !empty($_POST['cursos']))) {
    
    $result = "SELECT * FROM instituicao JOIN inst_curso ON SIGLA_inst = SIGLA JOIN curso ON codCurso = id_curso WHERE nomeInst LIKE '%".$pesquisar."%' AND codCurso = '$resposta_curso'";

} elseif(!empty($_POST['pesquisar'] and !empty($_POST['tipoEnsino']))) {
    
    $result = "SELECT * FROM instituicao WHERE nomeInst LIKE '%".$pesquisar."%' AND tipoEnsino = '$resposta_tipo'";

} elseif(!empty($_POST['pesquisar'] and !empty($_POST['cidades']))) {
    
    $result = "SELECT * FROM instituicao WHERE nomeInst LIKE '%".$pesquisar."%' AND municipio = '$resposta_cidade'";

} elseif(!empty($_POST['cursos'] and !empty($_POST['tipoEnsino']))) {
    
    $result = "SELECT * FROM instituicao JOIN inst_curso ON SIGLA_inst = SIGLA JOIN curso ON codCurso = id_curso WHERE codCurso = '$resposta_curso' AND tipoEnsino = '$resposta_tipo'";

} elseif(!empty($_POST['cursos'] and !empty($_POST['cidades']))) {
    
    $result = "SELECT * FROM instituicao JOIN inst_curso ON SIGLA_inst = SIGLA JOIN curso ON codCurso = id_curso WHERE codCurso = '$resposta_curso' AND municipio = '$resposta_cidade'";

} elseif(!empty($_POST['tipoEnsino'] and !empty($_POST['cidades']))) {
    
    $result = "SELECT * FROM instituicao WHERE tipoEnsino = '$resposta_tipo' AND municipio = '$resposta_cidade'";

} elseif(!empty($_POST['pesquisar'])) {

    $result = "SELECT * FROM instituicao WHERE nomeInst LIKE '%".$pesquisar."%'";
    
} elseif(!empty($_POST['tipoEnsino'])) {

    $result = "SELECT * FROM instituicao WHERE tipoEnsino = '$resposta_tipo'";


} elseif(!empty($_POST['cursos'])) {


    $result = "SELECT * FROM instituicao JOIN inst_curso On SIGLA_inst = SIGLA JOIN curso ON codCurso = id_curso WHERE codCurso = '$resposta_curso'";


} elseif(!empty($_POST['cidades'])) {

    $result = "SELECT * FROM instituicao WHERE municipio = '$resposta_cidade'";


} else {

    $result = "SELECT * FROM instituicao";
}

if(empty($resposta_curso)){

    $resultado_pesquisa = mysqli_query($con, $result) or die (mysqli_error($con));
    $row = mysqli_num_rows($resultado_pesquisa);
    if($row > 0) {


        while($result_row = mysqli_fetch_array($resultado_pesquisa)){

        $nomeInst = $result_row['nomeInst'];

        echo "$nomeInst. <br>";
        }

    } else {

        echo "<center> Nenhhum resultado encontrado</center>"; 

    }

} else {

    $resultado_pesquisa = mysqli_query($con, $result) or die (mysqli_error($con));
    $row = mysqli_num_rows($resultado_pesquisa);
    if($row > 0) {


        while($result_row = mysqli_fetch_array($resultado_pesquisa)){

            $nomeInst = $result_row['nomeInst'];
            $nomeCurso = $result_row['nomeCurso'];

            echo "$nomeInst - $nomeCurso ; <br>";
        }

    } else {

        echo "<center> Nenhhum resultado encontrado</center>"; 

    }
}

?>
</body>
</html>

