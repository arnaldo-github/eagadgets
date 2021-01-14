@extends('layouts.admin')

@section('title', 'Alterar configurações')

@section('main')


<style>
    @media only screen and (min-width: 1000px) {
        .min-width-main-card {
            min-width: 50%;
        }
    }

    @media only screen and (max-width: 999px) {
        .min-width-main-card {
            min-width: 70%;
        }
    }

    @media only screen and (max-width: 599px) {
        .min-width-main-card {
            max-width: 80%;
        }
    }

    @media only screen and (max-width: 199px) {
        .min-width-main-card {
            min-width: 100%;
        }
    }
</style>



<div class="card min-width-main-card">
    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
        @endif

        <div class="">
            <h3>Alterar Foto</h3>
            <form action="{{url('/admin/options/save-hero-image')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Imagem banner</label>
                    <input type="file" accept="image/x-png, image/gif,image/jpeg" maxlength="255" required 
                    class="form-control" name="banner" id="banner">
                </div>
              
                <button type="submit" class="btn btn-primary">Salvar configurações</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('result')
<div>

    <div class="row">
        <?php $banner = setting('banner'); ?>
        @isset($banner)
            <img style="max-width: 100%;   min-width: 100%;" src="{{url(setting('banner'))}}" >
        @endisset
    
    </div>
  </div>
@endsection