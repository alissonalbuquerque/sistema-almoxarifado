@extends('templates.principal')

@section('title')
    Editar Material
@endsection

@section('content')
    <div style="border-bottom: #949494 2px solid; padding-bottom: 5px; margin-bottom: 10px">
        <h2>EDITAR MATERIAL</h2>
    </div>

    <form method="POST" action="{{ route('material.update', ['material' => $material->id]) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label for="imagem"> Selecione uma Imagem </label>
                <input class="form-control-file @error('imagem') is-invalid @enderror" type="file" name="imagem"
                       id="imagem" accept=".png, .jpg, .jpeg, .svg, .dib, .bmp">
                @error('imagem')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
          </div>
          <div class="form-group col-md-3">
            <label for="inputMaterial">Material</label>
            <input type="text" class="form-control  @error('nome') is-invalid @enderror" id="inputMaterial" name="nome" placeholder="Material" onkeypress="return onlyLetters(event,this);" value="{{ old('nome', $material->nome) }}">
            @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
          </div>
          <div class="form-group col-md-2">
            <label for="inputCodigo">Código</label>
            <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="inputCodigo" name="codigo" placeholder="Código" onkeypress="return onlyNums(event,this);" value="{{ old('codigo', $material->codigo) }}">
            @error('codigo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="inputQuantidadeMin">Quantidade mínima</label>
                <input type="number" class="form-control @error('quantidade_minima') is-invalid @enderror"
                       id="inputQuantidadeMin" name="quantidade_minima" min="0"
                       value="{{ old('quantidade_minima', $material->quantidade_minima) }}">
                @error('quantidade_minima')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div>
            <div div class="form-group col-md-12" class="form-row"
                 style="border-bottom: #cfc5c5 1px solid; padding: 0 0 20px 0; margin-bottom: 20px">
                <label for="inputDescricao">Descrição</label>
                <textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao"
                          id="inputDescricao" cols="30" rows="3">{{ old('descricao', $material->descricao) }}</textarea>
                @error('descricao')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-auto">
                <Button class="btn btn-secondary" type="button"
                        onClick="if(confirm('Tem certeza que deseja Cancelar a alteração do Material?')) location.href='{{route('material.indexEdit')}}'">
                    Cancelar
                </Button>
            </div>
            <div class="col-sm-auto">
                <Button class="btn btn-success" type="submit"
                        onclick="return confirm('Tem certeza que deseja Atualizar o Material?')"> Atualizar
                </Button>
            </div>
        </div>
    </form>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('js/material/edit.js')}}"></script>