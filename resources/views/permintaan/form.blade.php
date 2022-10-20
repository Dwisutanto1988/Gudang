
  {!! Form::open(array('route' => 'permintaan.store','method'=>'POST', 'class'=>'form-horizontal')) !!}
{!! Form::hidden('user_id', auth()->user()->id) !!}


<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group focused">
                <label class="form-control-label" for="name">No Permintaan<span class="small text-danger">*</span></label>
                {!! Form::text('no_permintaan', request()->no_permintaan, array('placeholder' => 'Daerah UP3','class' => 'form-control','readonly')) !!}
            </div>
        </div>
    </div>
</div>

    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="name">Tanggal<span class="small text-danger">*</span></label>
                    {!! Form::date('tanggal', null, array('placeholder' => 'tanggal','class' => 'form-control','required')) !!}
                </div>
            </div>

        </div>
    </div>

    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                {{-- <div class="form-group focused">
                    <label class="form-control-label" for="name">Wilker<span class="small text-danger">*</span></label>
                    {!! Form::text('wilker', null, array('placeholder' => 'wilker','class' => 'form-control','step'=>'any','required')) !!}
                </div> --}}
                <div class="form-group">
                    <label class="form-control-label" for="name">Wilker<span class="small text-danger">*</span></label>
                    <select class="custom-select" name="wilker" form-control-border" id="exampleSelectBorder" required>
                        <option value="">Pilih</option>
                        <option value="Kantor Induk">Kantor Induk</option>
                        <option value="Admin">Admin</option>
                        <option value="LAB">LAB</option>
                        <option value="Wilker Palaran">Wilker Palaran</option>
                        <option value="Wilker Pelabuhan">Wilker Pelabuhan</option>
                        <option value="Wilker Bandar APT">Wilker Bandara APT</option>
                        <option value="Wilker Bontang">Wilker Bontang</option>
                    </select>
                    </div>
            </div>

        </div>
    </div>

    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="name">Product<span class="small text-danger">*</span></label>

                    {{ Form::select('product_id', $product_id, null, ['class' => 'form-control select2bs4', 'placeholder' => '--Pilih Product--','required']) }}
                </div>
            </div>

        </div>
    </div>

    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="name">QTY<span class="small text-danger">*</span></label>
                    {!! Form::number('qty', null, array('placeholder' => 'qty','class' => 'form-control','min'=>1,'required')) !!}
                </div>
            </div>

        </div>
    </div>

    <!-- Button -->
    <div class="pl-lg-4">
        <div class="row">
            <div class="col text-left">
                <a href="{{ url('permintaan') }}" type="submit" class="btn btn-warning">back</a>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
<br> <br>

    <div class="row">
        <div class="col-lg-10">
    <table id="table" class="table table-sm table-bordered table-hover table-striped">
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Tanggal</th>
                <th>Wilker</th>
                <th>Product</th>
                <th>QTY</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $posts )

            <tr class="text-center">
                <td>{{ $no }} </td>
                <td>{{ ubahTgl($posts->tanggal) }} </td>
                <td>{{ $posts->wilker }} </td>
                <td>{{ getDataProduct('products','product_name',$posts->product_id) }} </td>
                <td>{{ $posts->qty }} </td>
                <td>

                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                    action="{{ route('permintaan.destroy', $posts->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                </form>

                </td>

            </tr>
            @php
                $no++;
            @endphp
            @endforeach
        </tbody>
        </table>

    </div>
</div>

