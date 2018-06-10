<div class="footer">
    <div class="pull-right" >
        <a href="#" data-toggle="modal" data-target="#myModal">
            Version <strong>{{ config('app.version') }}</strong>
        </a>
    </div>
    <div>
        <strong>Copyright</strong> Zangles &copy; 2018-Eternity
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Changes Log</h4>
            </div>
            <div class="modal-body">
                @php
                    $file = file_get_contents(base_path('CHANGELOG.md'));
                    $content = GrahamCampbell\Markdown\Facades\Markdown::convertToHtml($file);
                    echo $content;
                @endphp
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>