@extends('layouts.admin')

@section('content')
<div class="row">
    <a class="btn btn-primary pull-right" href="/admin/topics/create">添加话题</a>
</div>
<br>
<div class="row">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>PID</th>
                <th>Name</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($topics as $topic)
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->pid }}</td>
                <td>{{ $topic->name }}</td>
                <td>{{ $topic->created_at }}</td>
                <td><button class="btn btn-primary btn-xs">编辑</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
