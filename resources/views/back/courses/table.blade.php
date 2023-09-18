@if (auth()->user()->role_relation->courses_view == 1 )
    <table id="datatable" class="table table-hover dt-responsive w-100 table-striped table-bordered">
        <thead class="table-light">                                
            <tr>
                <th>اسم الدورة</th>
                <th>@lang('app.teacher')</th>
                <th>@lang('app.action')</th>
            </tr>
        </thead>
    </table>
@else
    <h4 class="text-center" style="margin: 100px auto;">
        لاتمتلك الصلاحيات لرؤيه محتوي الصفحة
        <img src="{{ url('back/images/rej2.png') }}" style="width: 80px;height: 78px;position: relative;bottom: 7px;bo"/>
    </h4>
@endif