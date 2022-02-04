<?php
class FuncionesXml
{
    function CreandoXML()
    {
        $documento=new DOMDocument('1.0');
        $documento->formatOutput=true;
        $raiz=$documento->createElement("USUARIOS");
        $raiz=$documento->appendChild($raiz);
        $usuario=$documento->createElement("Usuario");
        $usuario=$raiz->appendChild($usuario);
        $id=$documento->createElement("Id");
        $id=$usuario->appendChild($id);
        $textId=$documento->createTextNode(1);
        $textId=$id->appendChild($textId);

        $nombre=$documento->createElement("Nombre");
        $nombre=$usuario->appendChild($nombre);
        $textNombre=$documento->createTextNode("Jairo H");
        $textNombre=$nombre->appendChild($textNombre);

        $direccion=$documento->createElement("Direccion");
        $direccion=$usuario->appendChild($direccion);

        $calle=$documento->createElement("Calle");
        $calle=$direccion->appendChild($calle);
        $textCalle=$documento->createTextNode("Av. central");
        $textCalle=$calle->appendChild($textCalle);
        $colonia=$documento->createElement("Colonia");
        $colonia=$direccion->appendChild($colonia);
        $textColonia=$documento->createTextNode("fracc. los laguitos");
        $textColonia=$colonia->appendChild($textColonia);
        echo 'valor:'.$documento->save("/Users/repto/Downloads/Usuario.xml").'byte';
    }
    function LeerXML()
    {
        $usuarios=simplexml_load_file("/Users/repto/Downloads/Usuario.xml");
        foreach ($usuarios as $user) {
            echo "ID=".$user->Id."<br>";
            echo "NOMBRE=".$user->Nombre."<br>";
            echo "CALLE=".$user->Direccion->Calle."<br>";
        }
    }
    function CreandoXML_BD()
    {
        $documento=new DOMDocument('1.0');
        $documento->formatOutput=true;
        $raiz=$documento->createElement("USUARIOS");
        $raiz=$documento->appendChild($raiz);
        $mysqlConexion=new mysqli("localhost","root","","agencia");
        $consulta="SELECT * FROM Usuarios";
        $resultado=$mysqlConexion->query($consulta);
        while ($registro=$resultado->fetch_assoc()) {
            $usuario=$documento->createElement("Usuario");
            $usuario=$raiz->appendChild($usuario);
            //datos del usuario
            $id=$documento->createElement("Id");
            $id=$usuario->appendChild($id);
            $textId=$documento->createTextNode($registro["Id"]);
            $textId=$id->appendChild($textId);

            $nombre=$documento->createElement("Nombre");
            $nombre=$usuario->appendChild($nombre);
            $textNombre=$documento->createTextNode($registro["Nombre"]);
            $textNombre=$nombre->appendChild($textNombre);
            //datos de direccion
            $direccion=$documento->createElement("Direccion");
            $direccion=$usuario->appendChild($direccion);

            $calle=$documento->createElement("Calle");
            $calle=$direccion->appendChild($calle);
            $textCalle=$documento->createTextNode($registro["Calle"]);
            $textCalle=$calle->appendChild($textCalle);
            $colonia=$documento->createElement("Colonia");
            $colonia=$direccion->appendChild($colonia);
            $textColonia=$documento->createTextNode($registro["Colonia"]);
            $textColonia=$colonia->appendChild($textColonia);
        }

        echo 'valor:'.$documento->save("/Users/repto/Downloads/UsuarioBD.xml").'byte';
    }
    function LeerXML_BD()
    {
        $usuarios=simplexml_load_file("/Users/repto/Downloads/UsuarioBD.xml");
        foreach ($usuarios as $user) {
            echo "ID=".$user->Id."<br>";
            echo "NOMBRE=".$user->Nombre."<br>";
            echo "CALLE=".$user->Direccion->Calle."<br>";
        }
    }
}
?>