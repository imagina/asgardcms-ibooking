@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('ibooking::plans.title.create plan') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.ibooking.plan.index') }}">{{ trans('ibooking::plans.title.plans') }}</a></li>
        <li class="active">{{ trans('ibooking::plans.title.create plan') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.ibooking.plan.store'], 'method' => 'post']) !!}
    <div class="row">

        <div class="col-xs-12 col-sm-8">

            <div class="box box-primary">
                
                <div class="box-header">
                    <h3 class="box-title">{{trans('ibooking::common.translatable fields')}}</h3>
                </div>

                <div class="box-body">
                    <div class="nav-tabs-custom">
                        @include('partials.form-tab-headers')
                        <div class="tab-content">
                            <?php $i = 0; ?>
                            @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                <?php $i++; ?>
                                <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                    @include('ibooking::admin.plans.partials.create-fields-translatables', ['lang' => $locale])
                                </div>
                            @endforeach

                        </div>
                    </div> {{-- end nav-tabs-custom --}}
                </div>

            </div>

            @include('ibooking::admin.plans.partials.create-fields')
                
        </div>

       
        <div class="col-xs-12 col-sm-4">
            <div class="box box-primary">
                <div class="box-body">
                    @include('ibooking::admin.plans.partials.create-fields-right',['events' => $events])
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.ibooking.plan.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
            </div>
        </div>

    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.ibooking.plan.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@endpush
