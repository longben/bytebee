<script type="text/javascript">
function openEasyUiWindow(_url, _title, _width, _height, _scrolling) {
    $('#easyuiWindow').html('<iframe scrolling="'+ _scrolling +'" frameborder="0"  src="' + _url + '" style="width:100%;height:100%;"></iframe>');
    $('#easyuiWindow').window({
        title: _title,
            width: _width,
            height: _height,			
            top:($(window).height() - _height) * 0.5,
            left:($(window).width() - _width) * 0.5,			
            modal: true,
            shadow: true,
            closed: false,
            collapsible:false,
            minimizable:false,
            maximizable:false,
            resizable:false
            //href:_url
    });
}
</script>

<div id="easyuiWindow" class="easyui-window" closed="true" iconCls="icon-save" style="background: #fafafa;"></div>
