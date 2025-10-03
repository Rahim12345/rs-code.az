<div id="id01" class="modal1 modal" >
    <div id="langId" style="display:none;"></div>
    <div class="center">
        <form class="modal-content animate" action="/place-an-order/" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close cnlBtn" title={{__('index.modal2')}}>×</span>
                <h3>{{ __('static.brif') }}</h3>
            </div>

            <div class="container" >
                <div class="brief-all">
                    <a type="button" class="btn btn-primary mb-2 text-light w-100 butn read" data-toggle="modal" data-target="#logo">{{ __('static.brif_logo') }}</a>
                    <a type="button" class="btn btn-primary mb-2 text-light w-100 butn read" data-toggle="modal" data-target="#web">{{ __('static.brif_vebsayt') }}</a>
                    <a type="button" class="btn btn-primary mb-2 text-light w-100 butn read" data-toggle="modal" data-target="#adlandirma">{{ __('static.brif_adlandirma') }}</a>
                    <a type="button" class="btn btn-primary mb-2 text-light w-100 butn read" data-toggle="modal" data-target="#smm">{{ __('static.brif_smm') }}</a>
                    <a type="button" class="btn btn-primary mb-2 text-light w-100 butn read" data-toggle="modal" data-target="#seo">{{ __('static.brif_seo') }}</a>
                </div>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn btn cnlBtn">{{__('index.modal20')}}</button>
                <span class="psw"><a href="/contact">{{__('index.contact')}}</a></span>
            </div>
        </form>
    </div>
</div>


<!-- MODAL -->
@include('front.includes.brif-modal-one')
@include('front.includes.brif-modal-two')
@include('front.includes.brif-modal-three')
@include('front.includes.brif-modal-four')
@include('front.includes.brif-modal-five')
<!-- MODAL -->
