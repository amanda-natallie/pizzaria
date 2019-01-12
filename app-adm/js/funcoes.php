<?php 
require("../config.php");
    if(isset($_GET['acao'])){
        require '../../phpmailer/PHPMailerAutoload.php';
        require '../../phpmailer/class.phpmailer.php';
        $acao = $_GET['acao']; 
        if($acao == "redefinir")
        {
        
            $email = $_GET['email'];
            $sql = 'SELECT * FROM tbl_usuario WHERE usuario = :email';   
            $total = 0;
            try{

                $read = $db->prepare($sql);
                $read->bindParam(':email', $email, PDO::PARAM_STR);
                $read->execute();

            } catch (PDOException $ex) {
                echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
            }

            while($rs = $read->fetch(PDO::FETCH_OBJ))
            {
                $total++;
            }
            if($total == 0)
            {
                echo 0;
            }else{
                    $senha = mt_rand(1000000, 9999999);
                    $criptografada = md5($senha);
                    
                    $sql2 = 'UPDATE tbl_usuario SET senha = :senha WHERE usuario = :email';

                    try{

                        $create = $db->prepare($sql2);
                        $create->bindValue(':senha', $criptografada, PDO::PARAM_STR);
                        $create->bindValue(':email', $email, PDO::PARAM_INT);

                        if($create->execute() ){
                            

                            $conteudo = '<html>
                                                         <head>
                                                             <meta charset="UTF-8">
                                                         </head>
                                                        <body style=" border: 0; margin: 0;">
                                                        <table width="650" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #999999; background: #EEEEEE;">
                                                          <tr style=" height: 30px; background: #4396FF; color: #fff; font-size: 20px; font-family: verdana; text-align: center;  ">
                                                                <td>
                                                                   '.$nome_email.'; - Redefinição de Senha
                                                                </td>
                                                          </tr>
                                                          <tr>
                                                            <td>
                                                                <table width="90%" border="0" cellspacing="15" cellpadding="15" style=" background: #fff; margin-left: 5%; margin-top: 5%; margin-bottom: 5%;" >
                                                              <tr>
                                                                <td>
                                                                  <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;">Uma nova senha foi gerada para você.</p>
                                                                  <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Email:</strong> '.$email.' </p>
                                                                  <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Senha:</strong> '.$senha.' </p>
                                                               </td>
                                                              </tr>
                                                            </table></td>
                                                          </tr>
                                                        </table>

                                                        </body>
                                                        </html>';

                                    $mailer = new PHPMailer;
                                    $mailer->isSMTP(); 
                                    $mailer->SMTPOptions = array(
                                        'ssl' => array(
                                            'verify_peer' => false,
                                            'verify_peer_name' => false,
                                            'allow_self_signed' => true
                                        )
                                    );
                                    $mailer->Host = $host_email;
                                    $mailer->SMTPAuth = true;    
                                    $mailer->IsSMTP();
                                    $mailer->isHTML(true);   
                                    $mailer->Port = $porta_email;
                                    $mailer->Username = $rem_email;           
                                    $mailer->Password = $pass_email; 
                                    $mailer->AddAddress($email);
                                    $mailer->From = $rem_email;
                                    $mailer->Sender = $rem_email;
                                    $mailer->FromName = $nome_email; 
                                    $mailer->Subject = utf8_decode("Redefinição de Senha");
                                    $mailer->MsgHTML($conteudo);
                                    if(!$mailer->Send()) {
                                    echo "Erro: " . $mailer->ErrorInfo;
                                   } else {

                                   }


                            echo 1;


                        }


                    } catch (PDOException $e) {
                            echo "Erro ao Alterar Registro! - " . $e->getMessage();
                    }

                }
            
            
        }
        
    }

?>