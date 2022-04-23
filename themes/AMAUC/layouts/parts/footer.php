</section>
<footer>
    
    <div id="main-footer">
        <div class="row">
            <div id="footer-municipios">
                <a href="#" title="Município de Arabutã"><img src="<?php $this->asset('img/municipios/arabutã.png'); ?>" alt="Município de Arabutã"></a>
                <a href="#" title="Município de Concórdia"><img src="<?php $this->asset('img/municipios/concordia.png'); ?>" alt="Município de Concórdia"></a>
                <a href="#" title="Município de Ipira"><img src="<?php $this->asset('img/municipios/ipira.png'); ?>" alt="Município de Ipira"></a>
                <a href="#" title="Município de Iraní"><img src="<?php $this->asset('img/municipios/irani.png'); ?>" alt="Município de Iraní"></a>
                <a href="#" title="Município de Itá"><img src="<?php $this->asset('img/municipios/itá.png'); ?>" alt="Município de Itá"></a>
                <a href="#" title="Município de Jaborá"><img src="<?php $this->asset('img/municipios/jaborá.png'); ?>" alt="Município de Jaborá"></a>
                <a href="#" title="Município de Lindóia do Sul"><img src="<?php $this->asset('img/municipios/lindóia-do-sul.png'); ?>" alt="Município de Lindóia do Sul"></a>
                <a href="#" title="Município de Peritiba"><img src="<?php $this->asset('img/municipios/peritiba.png'); ?>" alt="Município de Peritiba"></a>
                <a href="#" title="Município de Piratuba"><img src="<?php $this->asset('img/municipios/piratuba.png'); ?>" alt="Município de Piratuba"></a>
                <a href="#" title="Município de Presidente Castelo Branco"><img src="<?php $this->asset('img/municipios/presidente-castelo-branco.png'); ?>" alt="Município de Presidente Castelo Branco"></a>
                <a href="#" title="Município de Seara"><img src="<?php $this->asset('img/municipios/seara.png'); ?>" alt="Município de Seara"></a>
                <a href="#" title="Município de Xavantina"><img src="<?php $this->asset('img/municipios/xavantina.png'); ?>" alt="Município de Xavantina"></a>
            </div>
        </div>
        <div class="row logos">
            <div class="column">
                <p class="logo-instituicao"><a href="https://www.amauc.org.br/"><img src="<?php $this->asset('img/logo-site.png'); ?>" alt="Município de AMAUC - Associação dos Municípios do Alto Uruguai Catarinense"></a></p>
                <p class="social-icons">
                    <a href="#" aria-label="Facebook">&#xe093;</a>
                    <a href="# aria-label="Twitter">&#xe094;</a>
                    <a href="#" aria-label="Vimeo">&#xe09c;</a>
                    <a href="#" aria-label="YouTube">&#xe0a3;</a>
                </p>
            </div>
            <div class="column">
                <p class="logo-hacklab">Desenvolvido pelo <a href="https://hacklab.com.br"><img src="<?php $this->asset('img/logo-hacklab.svg'); ?>" alt="Município de hacklab/"></a></p>
            </div>
        </div>
    </div>
</footer>
<?php $this->part('templates'); ?>
<?php $this->bodyEnd(); ?>
<iframe id="require-authentication" src="" style="display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; z-index:100000"></iframe>

<?php if ($this->isEditable()): ?>
    <div id="editbox-human-crop" class="js-editbox" title="<?php \MapasCulturais\i::esc_attr_e("Recortar imagem");?>">
        <img id="human-crop-image"/>
    </div>
<?php endif; ?>
</body>
</html>
