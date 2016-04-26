                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>所属用户</th>
                                            <th>金额</th>
                                            <th>状态</th>
                                            <th>排队时间</th>
                                            <th>修改时间</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($in_list as $list)
                                        <tr class="gradeC" user_id="{{$list->id}}">
                                            <td>{{$list->id}}</td>
                                            <td>{{$list->u_id}}</td>
                                            <td>{{$list->money}}</td>
                                            <td>@if($list->status eq 0)排队中 @else if($list->status eq 1) 已匹配 @else  @endif</td>
                                            <td>{{$list->created_at}}</td>
                                            <td>{{$list->updated_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <nav id="pagination">
                                    {!!$in_list->render()!!}
                                </nav>
                            