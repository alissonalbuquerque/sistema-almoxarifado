@extends('templates.principal')

@section('title') Entrada de Material @endsection

@section('content')
    <div style="border-bottom: #949494 2px solid; padding-bottom: 5px; margin-bottom: 10px">
        <h2>TRANSFERÊNCIA DE MATERIAL</h2>
    </div>
    <form method="POST" action="{{ route('movimento.transferenciaStore') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="selectMaterial">Material</label>
                <select id="selectMaterial" class="selectMaterial @error('material_id') is-invalid @enderror" class="form-control" style="width: 95%;" autofocus name="material_id">
                    <option></option>
                    @foreach($materiais as $material)
                        <option value="{{$material->id}}">{{$material->codigo}} - {{ $material->nome }}</option>
                    @endforeach
                </select>
                @error('material_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="inputDepositoOrigem">Depósito de origem</label>
                <select id="inputDepositoOrigem" class="form-control @error('deposito_id_origem') is-invalid @enderror" autofocus name="deposito_id_origem">
                    <option selected hidden>Escolher...</option>
                    @foreach($depositos as $deposito)
                        <option value="{{ $deposito->id }}"> {{ $deposito->id }}. {{$deposito->nome}} </option>
                    @endforeach
                </select>
                @error('deposito_id_origem')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="inputDepositoDestino">Depósito de destino</label>
                <select id="inputDepositoDestino" class="form-control @error('deposito_id_destino') is-invalid @enderror" autofocus name="deposito_id_destino">
                    <option selected hidden>Escolher...</option>
                    @foreach($depositos as $deposito)
                        <option value="{{ $deposito->id }}"> {{ $deposito->id }}. {{$deposito->nome}} </option>
                    @endforeach
                </select>
                @error('deposito_id_destino')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="inputQuantidade">Quantidade</label>
                <input type="number" class="form-control @error('quantidade') is-invalid @enderror" autofocus id="inputQuantidade" name="quantidade" value="{{ old('quantidade') }}">
                @error('quantidade')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
            <div>
                <div class="form-group col-md-12" class="form-row" style="border-bottom: #cfc5c5 1px solid; padding: 0 0 20px 0; margin-bottom: 20px">
                    <label for="inputDescricao">Descrição</label>
                    <textarea class="form-control @error('descricao') is-invalid @enderror" autofocus name="descricao" id="inputDescricao" cols="30" rows="3">{{ old('descricao') }}</textarea>
                    @error('descricao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        <input type="hidden" name="operacao" value="2">

        @if(session()->has('erro'))
            <p style="color: red">
                {{ session()->get('erro') }}
            </p>
        @endif

        <Button class="btn btn-secondary" type="button" onclick="location.href = '../' "> Cancelar </Button>
        <button class="btn btn-success" type="submit">Transferir</button>
    </form>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
