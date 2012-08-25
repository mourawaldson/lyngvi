<?php

class Fachada {
	private $tela;
	function __construct( $acao ){
		switch ( $acao ) {

			case 'TelaLogarAdministrador':
				require_once("./gui/administrador/TelaLogarAdministrador.php");
				$this->setTela( new TelaLogarAdministrador() );
				break;

			case 'logarAdministrador':
				require_once("./util/Administrador.php");
				require_once("./control/ControladorAdministrador.php");

				$login = $_REQUEST['login'];
				$senha = $_REQUEST['senha'];

				$Administrador = new Administrador($login,$senha);

				$AdministradorControlado = new ControladorAdministrador($Administrador);

					if ($AdministradorControlado->verificaLogin()){
						$AdministradorControlado->carregarAdministrador();
						$AdministradorControlado->iniciarSessionAdministrador();
						header("Location: index.php?acao=exibeTelaAdministradorLogado");
					}else{
						header("Location: index.php?acao=TelaErro&msg=Login ou senha incorreta.");
					}
				break;

			case 'exibeTelaAdministradorLogado':
				require_once("./gui/administrador/TelaAdministradorLogado.php");
				require_once("./util/Administrador.php");
				require_once("./gui/administrador/ChecarAdministrador.php");
				$this->setTela( new TelaAdministradorLogado() );
				break;

			case 'deslogarAdministrador':
				require_once("./control/ControladorAdministrador.php");
				$AdministradorControlado = new ControladorAdministrador($_SESSION['administrador']);
				$AdministradorControlado->fecharSessionAdministrador();
				header("Location: index.php?acao=TelaLogarAdministrador");
				break;

			case 'TelaAlteraAdministrador':
				require_once("./util/Administrador.php");
				require_once("./gui/administrador/TelaAlteraAdministrador.php");
				require_once("./gui/administrador/ChecarAdministrador.php");
				$this->setTela( new TelaAlteraAdministrador() );
				break;

			case 'alterarAdministrador':
				require_once("./util/Administrador.php");
				require_once("./control/ControladorAdministrador.php");
				require_once("./gui/administrador/ChecarAdministrador.php");

				session_start();

				$novasenha = $_REQUEST['novasenha'];

				if ( $novasenha <> NULL ){

					$Administrador = new Administrador($_SESSION['administrador']->getLogin(),$novasenha);
					$AdministradorControlado = new ControladorAdministrador($Administrador);

					if ($AdministradorControlado->alterarAdministrador()){
						echo "<script>alert('Alteração efetuada com sucesso');history.back(-1);</script>";
					}else{
						header("Location: index.php?acao=TelaErro&msg=Houve um erro no momento da alteração!.");
					}
				}else{
					header("Location: index.php?acao=TelaErro&msg=Preencha a nova senha!.");
				}
				break;

			/**********************Listagens****************************/
			case 'listarCartas';
				require_once("./control/ControladorCarta.php");
				require_once("./gui/TelaListaCartas.php");
				require_once("./gui/administrador/ChecarAdministrador.php");

				$listaCartas = ControladorCarta::listagemCartas();

				session_start();
				$_SESSION['listacartas'] = $listaCartas;

				$this->setTela( new TelaListaCartas() );
			break;

			case 'listarTerrenos':
				require_once("./control/ControladorTerreno.php");
				require_once("./gui/TelaListaTerrenos.php");
				require_once("./gui/administrador/ChecarAdministrador.php");

				$listaTerrenos = ControladorTerreno::listagemTerrenos();

				session_start();
				$_SESSION['listaterrenos'] = $listaTerrenos;

				$this->setTela( new TelaListaTerrenos() );
				break;

			case 'listarUsuarios':
				require_once("./control/ControladorUsuario.php");
				require_once("./gui/TelaListaUsuarios.php");
				require_once("./gui/administrador/ChecarAdministrador.php");

				$listaUsuarios = ControladorUsuario::listagemUsuarios();

				session_start();
				$_SESSION['listausuarios'] = $listaUsuarios;

				$this->setTela( new TelaListaUsuarios() );
				break;
			/*---------------------Fim das Listagens----------------------*/

			/**************************Notícias****************************/
			case 'TelaCadastroNoticia':
				require_once("./gui/TelaCadastroNoticia.php");
				require_once("./gui/administrador/ChecarAdministrador.php");
				$this->setTela( new TelaCadastroNoticia() );
				break;

			case 'cadastrarNoticia':
				require_once("./util/Noticia.php");
				require_once("./control/ControladorNoticia.php");

				$titulo = $_REQUEST['titulo'];
				$texto = $_REQUEST['texto'];

				if ( ($titulo <> NULL) and ($texto <> NULL) ){
					$Noticia = new Noticia($titulo,$texto,$datahora);
					$NoticiaControlada = new ControladorNoticia($Noticia);
					$NoticiaControlada->iniciarSessionNoticia();

					if ($NoticiaControlada->inserirNoticia()){
						echo "<script>alert('Notícia cadastrada com sucesso');history.back(-1);</script>";
					}else{
						header("Location: index.php?acao=TelaErro&msg=Houve um erro no cadastro da notícia!");
					}
				}else{
					header("Location: index.php?acao=TelaErro&msg=Todos os campos precisam ser preenchidos!");
				}
				break;

			case 'TelaNoticias':
				require_once('./control/ControladorNoticia.php');
				require_once('./sql/NoticiaSQL.php');
				$listaNoticias = ControladorNoticia::listarNoticias();
				if ($listaNoticias <> NULL){
					ControladorNoticia::iniciarSessionNoticia();
					$_SESSION['noticia'] = $listaNoticias;
					header("Location: index.php?acao=exibeTelaNoticias");
				}else{
					header("Location: index.php?acao=TelaErro&msg=No momento não existem notícias!");
				}
				break;

			case 'mostrarNoticia':
				require_once("./util/Noticia.php");
				require_once('./control/ControladorNoticia.php');
				require_once('./sql/NoticiaSQL.php');

				$idnoticia = $_REQUEST['idnoticia'];

				$Noticia = new Noticia('','','',$idnoticia);
				$NoticiaControlada = new ControladorNoticia($Noticia);

				if ($NoticiaControlada->pesquisarNoticia( $Noticia->getId() ) ){
					$NoticiaControlada->carregarNoticia();
					session_start();
					$_SESSION['noticiaEscolhida'] = $Noticia;
					header("Location: index.php?acao=exibeTelaNoticiaEscolhida");
				}else{
					header("Location: index.php?acao=TelaErro&msg=Notícia não encontrada!");
				}

				break;
				
			case 'exibeTelaNoticiaEscolhida':
				require_once("./gui/TelaNoticiaEscolhida.php");
				require_once("./util/Noticia.php");
				session_start();
				$this->setTela( new TelaNoticiaEscolhida() );
				break;

			case 'exibeTelaNoticias':
				require_once("./gui/TelaNoticias.php");
				session_start();
				$this->setTela( new TelaNoticias() );
				break;
			/*------------------------Fim de Notícias----------------------*/

			/**************************Cartas****************************/
			case 'TelaCadastroCarta':
				require_once("./gui/TelaCadastroCarta.php");
				require_once("./gui/administrador/ChecarAdministrador.php");
				$this->setTela( new TelaCadastroCarta() );
				break;

			case 'cadastrarCarta':
				break;
			/*----------------------Fim de Cartas----------------------*/

			/*************************Terrenos****************************/
			case 'TelaCadastroTerreno':
				require_once("./gui/TelaCadastroTerreno.php");
				require_once("./gui/administrador/ChecarAdministrador.php");
				$this->setTela( new TelaCadastroTerreno() );
				break;

			case 'cadastrarTerreno':
				require_once("./util/Terreno.php");
				require_once("./control/ControladorTerreno.php");
				require_once("./gui/administrador/ChecarAdministrador.php");

				$nometerreno = $_REQUEST['nome'];

				if ($nometerreno <> NULL) {
					$Terreno = new Terreno("",$nometerreno);
					$TerrenoControlado = new ControladorTerreno($Terreno);

					if ($TerrenoControlado->inserirTerreno()){
						echo "<script>alert('Terreno cadastrado com sucesso');history.back(-1);</script>";
					}else{
						header("Location: index.php?acao=TelaErro&msg=Terreno <i>".$nometerreno."</i> já existe.");
					}
				}else{
					header("Location: index.php?acao=TelaErro&msg=Preencha o nome do terreno!.");
				}
				break;

			case 'TelaAlteraTerreno':
				require_once("./util/Terreno.php");
				require_once("./gui/TelaAlteraTerreno.php");
				require_once("./gui/administrador/ChecarAdministrador.php");
				$_SESSION['id'] = $_REQUEST['idterreno']; //obs:ver se pode ser assim!!
				$this->setTela( new TelaAlteraTerreno() );
				break;

			 case 'alterarTerreno':
				require_once("./util/Terreno.php");
				require_once("./control/ControladorTerreno.php");
				require_once("./gui/administrador/ChecarAdministrador.php");

				$id = $_SESSION['id'];
				$nometerreno = $_REQUEST['novonome'];

				if ($nometerreno <> NULL){
					$Terreno = new Terreno($id,$nometerreno);
					$TerrenoControlado = new ControladorTerreno($Terreno);

					if ($TerrenoControlado->alterarTerreno()){
						echo "<script>alert('Alteração efetuada com sucesso');history.back(-1);</script>";
					}else{
						header("Location: index.php?acao=TelaErro&msg=Houve um erro no momento da alteração!.");
					}
				}else{
					header("Location: index.php?acao=TelaErro&msg=Preencha o novo nome!.");
				}
				break;

			case 'excluirTerreno':
				require_once("./util/Terreno.php");
				require_once("./control/ControladorTerreno.php");
				require_once("./gui/administrador/ChecarAdministrador.php");

				$id = $_REQUEST['idterreno'];

				$Terreno = new Terreno($id,"");
				$TerrenoControlado = new ControladorTerreno($Terreno);

				if ($TerrenoControlado->excluirTerreno()){
					echo "<script>alert('Terreno excluido com sucesso');history.back(-1);</script>";
				}else{
					header("Location: index.php?acao=TelaErro&msg=Terreno não pôde ser excluido.");
				}

				break;
			/*----------------------Fim de Terrenos----------------------*/

			/*##########################  Usuários ################################*/
			case 'TelaCadastroUsuario':
				require_once("./gui/usuario/TelaCadastroUsuario.php");
				$this->setTela( new TelaCadastroUsuario() );
				break;

			case 'cadastrarUsuario':
				require_once("./util/Usuario.php");
				require_once("./control/ControladorUsuario.php");

				$login = $_REQUEST['login'];
				$senha = $_REQUEST['senha'];
				$email = $_REQUEST['email'];

				if ( ($login <> NULL) and ($senha <> NULL) and ($email <> NULL) ){
					$Usuario = new Usuario($login,$senha,$email);
					$UsuarioControlado = new ControladorUsuario($Usuario);

					if ($UsuarioControlado->inserirUsuario()){
						echo "<script language='javascript'>alert('Usuario ".$login." cadastrado com sucesso');history.back(-1);</script>";
					}else{
						header("Location: index.php?acao=TelaErro&msg=Usuário <i>".$login."</i> ou email <i>".$email."</i> já existentes.");
					}
				}else{
					header("Location: index.php?acao=TelaErro&msg=Todos os campos precisam ser preenchidos!.");
				}
				break;

			case 'TelaAlteraUsuario':
				require_once("./util/Usuario.php");
				require_once("./gui/usuario/TelaAlteraUsuario.php");
				require_once("./gui/usuario/ChecarUsuario.php");
				$this->setTela( new TelaAlteraUsuario() );
				break;

			 case 'alterarUsuario':
				require_once("./util/Usuario.php");
				require_once("./control/ControladorUsuario.php");
				require_once("./gui/usuario/ChecarUsuario.php");

				session_start();

			 	$senha = $_REQUEST['senha'];
				$email = $_REQUEST['email'];

				if ( ($senha <> NULL) and ($email <> NULL) ){

					$Usuario = new Usuario($_SESSION['usuario']->getLogin(),$senha,$email);
					$UsuarioControlado = new ControladorUsuario($Usuario);

					if ($UsuarioControlado->alterarUsuario()){
						echo "<script>alert('Alteração efetuada com sucesso');history.back(-1);</script>";
					}else{
						header("Location: index.php?acao=TelaErro&msg=Houve um erro no momento da alteração!.");
					}
				}else{
					header("Location: index.php?acao=TelaErro&msg=Todos os campos precisam ser preenchidos!.");
				}
				break;

			case 'excluirUsuario':
				require_once("./util/Usuario.php");
				require_once("./control/ControladorUsuario.php");
				require_once("./gui/administrador/ChecarAdministrador.php");

				$id = $_REQUEST['idusuario'];

				$Usuario = new Usuario("","","",$id);
				$UsuarioControlado = new ControladorUsuario($Usuario);

				if ($UsuarioControlado->excluirUsuario()){
					echo "<script>alert('Usuário excluido com sucesso');history.back(-1);</script>";
				}else{
					header("Location: index.php?acao=TelaErro&msg=Usuário não pôde ser excluido.");
				}
				break;

			case 'logarUsuario':
				require_once("./util/Usuario.php");
				require_once("./control/ControladorUsuario.php");

				$login = $_REQUEST['login'];
				$senha = $_REQUEST['senha'];
				$Usuario = new Usuario($login,$senha);

				$UsuarioControlado = new ControladorUsuario($Usuario);
					if ($UsuarioControlado->verificaLogin()){
						$UsuarioControlado->carregarUsuario();
						$UsuarioControlado->iniciarSessionUsuario();
						header("location: index.php?acao=exibeTelaUsuarioLogado");
					}else{
						header("Location: index.php?msg=Login ou senha incorreta.");
					}
				break;

			case 'exibeTelaUsuarioLogado':
				require_once("./gui/usuario/TelaUsuarioLogado.php");
				require_once("./util/Usuario.php");
				session_start();
				$this->setTela( new TelaUsuarioLogado() );
				break;

			case 'deslogarUsuario':
				require_once("./control/ControladorUsuario.php");
				$UsuarioControlado = new ControladorUsuario($_SESSION['usuario']);
				$UsuarioControlado->fecharSessionUsuario();
				header("Location: index.php");
				break;
			/*########################### Fim de Usuários ##############################*/

			/*########################### Jogadores ##############################*/
			case 'TelaCadastroJogador':
				require_once("./gui/usuario/ChecarUsuario.php");
				require_once("./gui/TelaCadastroJogador.php");
				$this->setTela( new TelaCadastroJogador() );
				break;

			case 'cadastrarJogador':
				require_once("./util/Jogador.php");
				require_once("./util/Baralho.php");
				require_once("./util/Usuario.php");
				require_once("./util/RandomCarta.php");
				require_once("./control/ControladorJogador.php");
				require_once("./control/ControladorBaralho.php");
				require_once("./control/ControladorUsuario.php");
				require_once("./gui/usuario/ChecarUsuario.php");

				$nome = $_REQUEST['nome'];
				$imagem = $_REQUEST['avatar'];
				$deus = $_REQUEST['deus'];

				if ( ($nome <> NULL) ){

					$Jogador = new Jogador('',$nome,$imagem);
					$JogadorControlado = new ControladorJogador($Jogador);

					session_start();
					if ( $JogadorControlado->inserirJogador( $_SESSION['usuario']->getId() ) ){
						 $JogadorControlado->carregarId();
						for ($x=0;$x<3;$x++){
							switch ($deus){
								case 0:
									$baralho = new Baralho("",RandomCarta::fectra());
									$baralhocontrolado = new ControladorBaralho($baralho);
									$baralhocontrolado->inserirBaralho($JogadorControlado->getPlayer()->getId());
									break;
								case 1:
									$baralho = new Baralho("",RandomCarta::cadmo());
									$baralhocontrolado = new ControladorBaralho($baralho);
									$baralhocontrolado->inserirBaralho($JogadorControlado->getPlayer()->getId());
									break;
							}
						}
						$UsuarioControlado = new ControladorUsuario($_SESSION['usuario']);
						$UsuarioControlado->carregarUsuario();
						echo "<script>alert('Jogador ".$nome." cadastrado com sucesso');history.back(-1);</script>";
					}else{
						header("Location: index.php?acao=TelaErro&msg=Jogador <i>".$nome."</i> já existe.");
					}
				}else{
					header("Location: index.php?acao=TelaErro&msg=O campo Nome precisa ser preenchido!.");
				}
				break;

			case 'logarJogador':
				require_once("./util/Usuario.php");
				require_once("./util/Jogador.php");
				require_once("./util/Baralho.php");
				require_once("./control/ControladorJogador.php");
				require_once("./gui/usuario/ChecarUsuario.php");

				$idjogador = $_REQUEST['RadioGroupJogador'];

				$jogador = new Jogador($idjogador,'','');
				$JogadorControlado = new ControladorJogador($jogador);
				$JogadorControlado->carregarJogador();
				$JogadorControlado->carregarBaralho();

				session_start();
				if ( $JogadorControlado->verificarJogadorLogado( $_SESSION['usuario']->getId() )){
					$JogadorControlado->atualizarJogadorLogado();
				}else{
					$JogadorControlado->logarJogador();
				}

				$jogadoreslogados = $JogadorControlado->listarJogadoresLogados();

				$_SESSION['jogadoreslogados'] = $jogadoreslogados;

				header("Location: index.php?acao=exibeTelaJogadorLogado");
				break;

			case 'exibeTelaJogadorLogado':
				require_once("./gui/TelaJogadorLogado.php");
				require_once("./util/Jogador.php");
				require_once("./gui/usuario/ChecarUsuario.php");
				require_once("./control/ControladorBatalha.php");
				session_start();
				ControladorBatalha::excluirBatalha($_SESSION['jogadorlogado']->getId());
				ControladorBatalha::excluirRound($_SESSION['jogadorlogado']->getId());
				//destruir convites
				
			
				$this->setTela( new TelaJogadorLogado() );
				break;

			case 'TelaBaralho':
				require_once("./util/Usuario.php");
				require_once("./util/Jogador.php");
				require_once("./gui/TelaBaralho.php");
				require_once("./gui/usuario/ChecarUsuario.php");
				session_start();
				$this->setTela( new TelaBaralho() );
				break;

			case 'deslogarJogador':
				require_once("./util/Usuario.php");
				require_once("./util/Jogador.php");
				require_once("./control/ControladorConvite.php");
				require_once("./control/ControladorJogador.php");
				require_once("./gui/usuario/ChecarUsuario.php");

				session_start();
				$idjogadordesafiado = $_SESSION['jogadorlogado']->getId();

				if (ControladorConvite::verificarJogadorDesafiado($idjogadordesafiado)){
					ControladorConvite::cancelarConviteJogadorDeslog($idjogadordesafiado);
				}
				$JogadorControlado = new ControladorJogador($_SESSION['jogadorlogado']);
				$JogadorControlado->deslogarJogador();

				header("location: index.php?acao=exibeTelaUsuarioLogado");
				break;

			case 'convidarJogador':
				require_once("./util/Usuario.php");
				require_once("./util/Jogador.php");
				require_once("./control/ControladorJogador.php");
				require_once("./control/ControladorXml.php");
				require_once("./control/ControladorConvite.php");
				require_once("./gui/TelaJogadorLogado.php");
				require_once("./gui/usuario/ChecarUsuario.php");

				session_start();
				$idjogadordesafiado = $_REQUEST['RadioGroupJogador'];
				$idjogadordesafiante = $_SESSION['jogadorlogado']->getId();

				if (ControladorConvite::verificarJogadorDesafiante( $idjogadordesafiante )){//verifica se ja estou desafiando alguem
					ControladorConvite::atualizarJogadorDesafiado($idjogadordesafiante,$idjogadordesafiado);
				}else{
					ControladorConvite::convidarJogador($idjogadordesafiante,$idjogadordesafiado);
				}

				header("Location: index.php?acao=exibeTelaJogadorLogado");
				break;

			case 'cancelarConvite':
				require_once("./util/Usuario.php");
				require_once("./util/Jogador.php");
				require_once("./control/ControladorConvite.php");
				require_once("./gui/TelaConvites.php");
				require_once("./gui/usuario/ChecarUsuario.php");

				$idjogadordesafiado = $_SESSION['jogadorlogado']->getId();
				$idjogadordesafiante = $_REQUEST['RadioGroupJogador'];

				if (ControladorConvite::existenciaConvite($idjogadordesafiante,$idjogadordesafiado)){
					ControladorConvite::cancelarConviteJogador($idjogadordesafiante,$idjogadordesafiado);
				}else{
					header("Location: index.php?acao=TelaErro&msg=Este convite já foi cancelado pelo desafiante!.");
				}
				header("Location: index.php?acao=verConvites");
				break;

			case 'verConvites':
				require_once("./util/Usuario.php");
				require_once("./util/Jogador.php");
				require_once("./control/ControladorConvite.php");
				require_once("./gui/usuario/ChecarUsuario.php");

				session_start();
				$idjogadordesafiado = $_SESSION['jogadorlogado']->getId();

				if (ControladorConvite::verificarJogadorDesafiado($idjogadordesafiado)){
					$convite = ControladorConvite::listarJogadoresDesafiantes($idjogadordesafiado);
					$_SESSION['convites'] = $convite;
					header("Location: index.php?acao=exibeTelaConvites");
				}else{
					$_SESSION['convites'] = NULL;
					header("Location: index.php?acao=TelaErro&msg=Não há convites no momento.");
				}
				break;

			case 'exibeTelaConvites':
				require_once("./gui/usuario/ChecarUsuario.php");
				require_once("./gui/TelaConvites.php");
				session_start();
				$this->setTela( new TelaConvites() );
				break;

			case 'aceitarConvite':
				require_once("./util/Usuario.php");
				require_once("./util/Jogador.php");
				require_once("./control/ControladorJogador.php");
				require_once("./control/ControladorConvite.php");
				require_once("./gui/usuario/ChecarUsuario.php");

				session_start();

				$idjogadordesafiante = $_REQUEST['RadioGroupJogador'];
				$idjogadordesafiado = $_SESSION['jogadorlogado']->getId();
				$_SESSION['inimigo'] = $idjogadordesafiante;
				if (ControladorConvite::existenciaConvite($idjogadordesafiante,$idjogadordesafiado)){
					ControladorConvite::aceitarConvite($idjogadordesafiante);
				}else{
					header("Location: index.php?acao=TelaErro&msg=Este convite já foi cancelado pelo desafiante!.");
				}

				header("Location: index.php?acao=exibeTelaEscolhaBaralho");
				break;

			case 'exibeTelaEscolhaBaralho':
				require_once("./util/Jogador.php");
				require_once("./gui/TelaEscolhaBaralho.php");
				require_once("./gui/usuario/ChecarUsuario.php");
				session_start();
				$this->setTela( new TelaEscolhaBaralho() );
				break;

			case 'verificaConviteAceito':
				require_once("./util/Usuario.php");
				require_once("./util/Jogador.php");
				require_once("./control/ControladorConvite.php");
				require_once("./control/ControladorJogador.php");
				require_once("./gui/usuario/ChecarUsuario.php");

				session_start();
				$idjogadordesafiante = $_SESSION['jogadorlogado']->getId();

				if (ControladorConvite::verificaConviteAceito($idjogadordesafiante)){
				
					$jogadordesafiado = ControladorConvite::idJogadorDesafiado($idjogadordesafiante);
					
					$_SESSION['inimigo'] = $jogadordesafiado[0]['Id_Jogador_Desafiado'];
					ControladorConvite::cancelarConviteJogador($_SESSION['jogadorlogado']->getId(),$_SESSION['inimigo']);
					header("Location: index.php?acao=exibeTelaEscolhaBaralho");
				}else{
					$JogadorControlado = new ControladorJogador($_SESSION['jogadorlogado']);
					$JogadorControlado->atualizarJogadorLogado();
					$jogadoreslogados = $JogadorControlado->listarJogadoresLogados();
					$_SESSION['jogadoreslogados'] = $jogadoreslogados;
					
					header("Location: index.php?acao=exibeTelaJogadorLogado");
				}
				break;

			case 'verificaCartasEscolhidas':
				require_once("./util/Jogador.php");
				require_once("./control/ControladorCartasEscolhidas.php");
				require_once("./control/ControladorBatalha.php");
				require_once("./gui/usuario/ChecarUsuario.php");

				session_start();
				$idinimigo = $_SESSION['inimigo'];

				if (ControladorBatalha::verificaStatus($idinimigo)){
					header("Location: index.php?acao=logBatalha");
				}else{
					header("Location: index.php?acao=exibeTelaEspera");
				}
				break;

			case 'escolherCartas':
				require_once("./util/Jogador.php");
				require_once("./control/ControladorCartasEscolhidas.php");
				require_once("./control/ControladorBatalha.php");
				require_once("./gui/usuario/ChecarUsuario.php");

				session_start();
				$oponente = $_REQUEST['inimigo'];
				$_SESSION['inimigo'] = $oponente;
				$id_jogador = $_SESSION['jogadorlogado']->getId();
				$id_baralho1 = $_REQUEST['round1'];
				$id_baralho2 = $_REQUEST['round2'];
				$id_baralho3 = $_REQUEST['round3'];

				if ($id_baralho1 == $id_baralho2 || $id_baralho1 == $id_baralho3 || $id_baralho2 == $id_baralho3){
					echo "<script>alert('As cartas não podem se repetir!');history.back(-1);</script>";
					header("Location: index.php?acao=exibeTelaEscolhaBaralho");
					break;
				}if(ControladorCartasEscolhidas::verificaExistencia($id_jogador)){
					ControladorCartasEscolhidas::alterarCartasEscolhidas($id_jogador,$id_baralho1,$id_baralho2,$id_baralho3);
				}else{
					ControladorCartasEscolhidas::registraCartasEscolhidas($id_jogador,$id_baralho1,$id_baralho2,$id_baralho3);
				}if(ControladorBatalha::verificaExistencia($_SESSION['jogadorlogado']->getId())) {
					header("Location: index.php?acao=batalhar");
					break;
				}
				ControladorBatalha::criarBatalha($oponente);
				header("Location: index.php?acao=exibeTelaEspera");

				break;

			case 'exibeTelaEspera':
				require_once("./gui/TelaEspera.php");
				require_once("./gui/usuario/ChecarUsuario.php");
				$this->setTela( new TelaEspera() );
				break;

			case 'batalhar':
				require_once("./util/Baralho.php");
				require_once("./util/Jogador.php");
				require_once("./util/Round.php");
				require_once("./util/Batalha.php");
				
				require_once("./control/ControladorJogador.php");
				require_once("./control/ControladorBaralho.php");
				require_once("./control/ControladorBatalha.php");
				require_once("./control/ControladorCartasEscolhidas.php");
				require_once("./util/RandomCarta.php");

				session_start();
				
				//prepara jogadores
				$oponenteid = $_SESSION['inimigo'];
				$meujogador = $_SESSION['jogadorlogado'];
				$oponentejogador = new Jogador($oponenteid,'');
				$meujogadorcontrolado = new ControladorJogador($meujogador);
				$oponentejogadorcontrolado = new ControladorJogador($oponentejogador);
				$meujogadorcontrolado->carregarJogador();
				$oponentejogadorcontrolado->carregarJogador();
				$meujogador = $meujogadorcontrolado->getPlayer();
				$oponentejogador = $oponentejogadorcontrolado->getPlayer();
				//obtém as cartas escolhidas
				$minhascartasescolhidas = ControladorCartasEscolhidas::registrosCartasEscolhidas($meujogador->getId());
				$oponentecartasescolhidas = ControladorCartasEscolhidas::registrosCartasEscolhidas($oponentejogador->getId());
				//gera os rounds
				$roundprimeiro = ControladorBatalha::gerarRound($minhascartasescolhidas[0][id_baralho1],$oponentecartasescolhidas[0][id_baralho1]);
				$roundsegundo = ControladorBatalha::gerarRound($minhascartasescolhidas[0][id_baralho2],$oponentecartasescolhidas[0][id_baralho2]);
				$roundterceiro = ControladorBatalha::gerarRound($minhascartasescolhidas[0][id_baralho3],$oponentecartasescolhidas[0][id_baralho3]);
				//gera a batalha								
				$terreno = RandomCarta::terreno();
				$batalha = new Batalha($_SESSION['jogadorlogado']->getId(),$meujogador,$oponentejogador,$roundprimeiro,$roundsegundo,$roundterceiro,$terreno);
				$batalhando = new ControladorBatalha($batalha);
				//executa batalha
				$batalhando->executarBatalha();
				//prepara alteração dos jogadores no banco
				$jogador1 = new ControladorJogador($batalhando->getBatalha()->getJogador1());
				$jogador2 = new ControladorJogador($batalhando->getBatalha()->getJogador2());
				//altera jogadores no banco
				$jogador1->alterarJogador();
				$jogador2->alterarJogador();
				//insere round no banco
				$batalhando->criarRounds();
				//altera batalha no banco
				$batalhando->alterarBatalha();
				
				header("Location: index.php?acao=logBatalha");

				break;

			case 'logBatalha':
				require_once("./util/Baralho.php");
				require_once("./util/Jogador.php");
				require_once("./control/ControladorLog.php");
				require_once("./control/ControladorBaralho.php");
				require_once("./control/ControladorBatalha.php");
				
				session_start();
				
				$baralhovencedor = ControladorLog::baralhosVencedores($_SESSION['jogadorlogado']->getId());
				if(isset($baralhovencedor[0])){
					foreach($baralhovencedor as $cartavencedora){
						$vencedores[] = new Baralho($cartavencedora["Id_Baralho_Vencedor"],$cartavencedora["Id_Carta"],$cartavencedora["Level"],$cartavencedora["Experiencia"],$cartavencedora["HP"],$cartavencedora["Ataque"],$cartavencedora["Defesa"]);
						
						$perdedor = new Baralho($cartavencedora['Id_Baralho_Perdedor']);
						$perdedorcontrolado = new ControladorBaralho($perdedor);
						$perdedorcontrolado->carregarBaralho();
						$perdedores[] = $perdedorcontrolado->getBaralho();
					}
					$evoluidos = $vencedores;
					for($qtd=0 ; $qtd < count($evoluidos) ; $qtd++){
						$evoluidos[$qtd]->calculoExperiencia($perdedores[$qtd]);
						$baralhocontrolado = new ControladorBaralho($evoluidos[$qtd]);
						$baralhocontrolado->alterarBaralho();
					}
					$_SESSION['log']['vencedores'] = $vencedores;
					$_SESSION['log']['perdedores'] = $perdedores;
					$_SESSION['log']['evoluidos']  = $evoluidos;
				}if (isset($vencedores) && count($vencedores)>=2){
					$_SESSION['log']['situacao'] = 'Ganhou';
				}else{
					$_SESSION['log']['situacao'] = 'Perdeu';
				}
				unset($_SESSION['inimigo']);
				//ControladorBatalha::excluirBatalha($_SESSION['jogadorlogado']->getId());
				//ControladorBatalha::excluirRound($_SESSION['jogadorlogado']->getId());
				header("Location: index.php?acao=exibeTelaLogBatalha");
				break;
				
			case 'exibeTelaLogBatalha':
				require_once("./util/Baralho.php");
				require_once("./gui/TelaLogBatalha.php");
				session_start();
				$this->setTela( new TelaLogBatalha() );
				break;
			/*########################### Fim de Jogadores ##############################*/

			case 'TelaJogo':
				require_once("./gui/TelaJogo.php");
				$this->setTela( new TelaJogo() );
				break;

			case 'TelaPerfilPersonagens':
				require_once("./gui/TelaPerfilPersonagens.php");
				$this->setTela( new TelaPerfilPersonagens() );
				break;

			case 'TelaFaleConosco':
				require_once("./gui/TelaFaleConosco.php");
				$this->setTela( new TelaFaleConosco() );
				break;

			case 'enviarEmail':
				require_once("./gui/TelaFaleConosco.php");

				$nome = $_REQUEST['nome'];
				$email = $_REQUEST['email'];
				$destino = 'waldsoncabral@gmail.com';
				$assunto = $_REQUEST['assunto'];
				$conteudo = $_REQUEST['conteudo'];
				$headers = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-15\n";
				$headers .= "From: \"$nome\" <$email>\n";

				ini_set("SMTP","smtp.gmail.com");
				ini_set(smtp_port,"587");

				//if ( mail($destino,$assunto,$conteudo,$headers) ){
				if(true){
					echo "<script>alert('Mensagem enviada com sucesso');history.back(-1);</script>";
				}else{
					echo "não enviado";
					//header("Location: index.php?acao=TelaErro&msg=O E-mail não foi enviado corretamente!"); -> conflico com o header!
				}
				break;

			case 'TelaErro':
				if (isset($_GET['msg'])) {
					require_once("./gui/TelaErro.php");
					$this->setTela( new TelaErro($_GET['msg']) );
				}else{
					header("Location: index.php");
				}
				break;

			default:
				require_once("./gui/Inicial.php");
				$this->setTela( new Inicial() );
		}

	}

	private function setTela( $valor ) {
		$this->tela = $valor;
	}

	public function getTela(){
		return $this->tela;
	}

}

?>