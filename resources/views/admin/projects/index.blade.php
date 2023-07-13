@extends('admin.layouts.base')

@section('contents')
    <div class="table-responsive-xxl">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Title</th>
                    <th scope="col" class="text-center">Author</th>
                    <th scope="col" class="text-center">Creation Date</th>
                    <th scope="col" class="text-center">Last Update</th>
                    <th scope="col" class="text-center">Collaborators</th>
                    <th scope="col" class="text-center">Description</th>
                    <th scope="col" class="text-center">Languages</th>
                    <th scope="col" class="text-center">Link Github</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->title }}</th>
                        <td>{{ $project->author }}</td>
                        <td class="font-monospace">{{ $project->creation_date }}</td>
                        <td class="font-monospace">{{ $project->last_update }}</td>
                        <td>{{ $project->collaborators }}</td>
                        <td>{{ $project->description }}</td>
                        <td class="font-monospace">{{ $project->languages }}</td>
                        <td class="text-center"> <a href="{{ $project->link_github }}"> LINK </a></td>
                        <td class="text-center">
                            <a class="btn btn-primary m-1"
                                href="{{ route('admin.project.show', ['project' => $project->id]) }}">View</a>
                            <a class="btn btn-warning m-1"
                                href="{{ route('admin.project.edit', ['project' => $project->id]) }}">Edit</a>
                            <form action="{{ route('admin.project.destroy', ['project' => $project->id]) }}" method="post"
                                class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger m-1">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
