@extends('layouts.admin')

@section('styles')
    <style>
        #topic-avatar {
            display: block;
            width: 50px;
        }
        #topic-avatar > img {
            width: 50px;
            height: 50px;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <form action="{{ url('admin/topics') }}" method="POST" id="topic-form" class="form-horizontal" role="form">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="topics" class="col-md-3 control-label">话题</label>
            <div class="col-md-6">
                <select name="topics[]" id="topics" class="form-control" multiple>
                    @foreach ($root_topics as $topic)
                        <option value="{{ $topic->name }}>{{ $topic->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="desc" class="col-md-3 control-label">话题描述</label>
            <div class="col-md-6">
                <textarea name="desc" id="desc" class="form-control" rows="7" placeholder="请输入简单的描述"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="topic-avatar" class="col-md-3 control-label">图片</label>
            <div class="col-md-6">
                <a href="#" id="topic-avatar" name="topic-avatar">
                    <img src="/storage/avatars/topic-default.jpg" alt="">
                </a>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="button" class="btn btn-primary" onclick="document.getElementById('topic-form').submit();">
                    添加话题
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
    <script>
        $('#topics').select2({
            placeholder: '请选择话题',
            tags: true,
            data: [
                @foreach ($root_topics as $topic)
                    console.log({{ $topic->name }})
{{--                { id: {{ $topic->id }}, text: {{ $topic->name }} }--}}
                @endforeach
            ]
        });
    </script>
@endsection