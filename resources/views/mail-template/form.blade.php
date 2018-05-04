@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.register.title') }}</div>

                <form method="post" class="horizontal-form" action="{{ route('MailTemplate.PostUpdate', ['id'=>$templateId, 'locale'=>$locale]) }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right mb-2">
                                @foreach($locales as $locale)
                                    <a href="{{ route('MailTemplate.GetEdit', ['id'=>$templateId, 'locale'=>$locale]) }}" class="badge badge-primary p-2">{{ $locale }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="locale" value="{{ $locale }}" />
                                {{ csrf_field() }}
                                @foreach($errors as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                                <div class="row form-group">
                                    <label class="control-label col-md-3">Subject</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="subject" value="{{ $templateContent->subject }}" />
                                        {{ $errors->first('subject') }}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="control-label col-md-3">Content</label>
                                    <div class="col-md-9">
                                        <textarea rows="4" col="80" id="content" name="content" class="form-control">{{ $templateContent->content }}</textarea>
                                        {{ $errors->first('content') }}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="control-label col-md-3">Variables</label>
                                    <div class="col-md-9">
                                        @foreach($templateVariables as $templateVariable)
                                            <label class="p-2 tags badge badge-primary" data-tag="[{{ $templateVariable }}]">{{ $templateVariable }}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12 text-right p-0">
                            <input type="submit" value="save" class="btn btn-success" />
                            <a href="{{ route('MailTemplate.GetList') }}" class="btn btn-info">Cancel</a>
                            <a href="{{ route('MailTemplate.GetPreview', ['id'=>$mailTemplate->getId()]) }}" class="btn btn-info">Preview</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
{{--@push('body-js')--}}
    {{--<script>--}}
        {{--$('.tags').on('click', function() {--}}
            {{--var val = $('#content').val();--}}
            {{--$('#content').val( val + ' ' + $(this).data('tag'));--}}
        {{--});--}}
    {{--</script>--}}
{{--@endpush--}}