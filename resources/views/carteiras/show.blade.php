@extends("layouts.app")

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12 text-end">
                    <a class="btn-floating btn-small waves-effect waves-light green" data-bs-toggle="modal" data-bs-target="#new">
                        <i class="material-icons">add</i>
                    </a>
                    <div class="modal fade" id="new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Movimentação</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <form class="" action="{{ route('movement.new') }}" method="post">
                                        @csrf
                                        <input type="text" name="description" class="form-control" placeholder="Origem da movimentação">
                                        <br />
                                        <input type="date" name="date" class="form-control">
                                        <br />
                                        <input type="number" name="total" step="0.00" placeholder="Total" class="form-control">
                                        <br />
                                        <select class="form-control form-select" name="type">
                                            <option selected disabled>Selecione o tipo de movimentação</option>
                                            <option value="entry">Entrada</option>
                                            <option value="outflow">Saída</option>
                                        </select>
                                        <hr>
                                        <button class="btn btn-success w-100" type="submit" name="action">
                                            Salvar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="span-main">
                        <h1>{{ $wallet->getBalance($wallet->id) }}</h1>
                    </span>
                </div>
            </div>
            <hr />
            <br />
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            @foreach($wallet->movements as $movement)
                                @if($movement->type == 'entry')
                                    <li class="list-group-item">
                                        <span>{{ $movement->description }}</span>
                                        <span class="span-entry">{{ number_format($movement->total,2,",",".") }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            @foreach($wallet->movements as $movement)
                                @if($movement->type != 'entry')
                                    <li class="list-group-item">
                                        <span>{{ $movement->description }}</span>
                                        <span class="span-outflow">{{ number_format($movement->total,2,",",".") }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
