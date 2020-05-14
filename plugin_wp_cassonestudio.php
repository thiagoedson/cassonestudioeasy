<?php
    /**
     * Plugin Name: CassoneStudio Easy
     * Plugin URI: https://cassonestudio.com.br/cassonestudio-easy/
     * URI do projeto: https://github.com/thiagoedson/cassonestudioeasy
     * Description: Este é o primeiro plug-in que eu já criei.
     * Version: 1.0.0
     * Author: Thiago Edson Pereira
     * Author URI: https://twitter.com/thiagoedson
     **/
    
    
    function dh_modify_read_more_link()
    {
        
        return '<a class="more-link" href="'.get_permalink().'">Leia mais</a>';
        
    }
    
    function orcamento_whatsapp()
    {
        
        try {
            
            $nome      = $_POST['nome'];
            $email     = $_POST['email'];
            $produto   = $_POST['produto'];
            $msg_whats = "Olá meu nome é *".$nome."* desejo um orçamento para o *".$produto."* , meu e-mail é *".$email."*";
            $msg_whats = str_replace(' ', '%20', $msg_whats);
            
            $url_whatsa_app = "http://api.whatsapp.com/send?1=pt_BR&phone=5547996125955&text=$msg_whats";
            
            
            if(isset($_POST['enviar_orcamento'])) {
                ?>
                <script type="text/javascript">
                    window.location = "<?php echo $url_whatsa_app;?>";
                </script>
                <?php
            }
            
            /**
             * Gera o html do formulário
             **/
            #region Gera o html do formulário
            ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="produto">Produto</label>
                    <input type="text" name="produto" id="produto">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Pedir orçamento
                    </button>
                </div>
            </form>
            
            <?php
            #endregion
            
        }
        catch (Exception $e) {
        
        }
        
    }
    
    add_filter('the_content_more_link', 'dh_modify_read_more_link');

