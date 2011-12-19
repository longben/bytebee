WEBKP.namespace("SPACECORE")
WEBKP.SPACECORE = function(){
}
WEBKP.SPACECORE.prototype = {
    msinit: function(){
        $("#nowchange").click(function(){
            $.ajax({
                type: 'post',
                data: {
                    task_code: 'point'
                },
                dataType: 'json',
                url: 'index.php?ac=space&op=score2space',
                success: function(result){
                    var message = "";
                    var title = "任务失败";
                    var error = true;
                    switch (result.state) {
                        case 1:
                            error = false;
                            title = "兑换成功";
                            message = "任务完成，空间添加成功";
                            break;
                        case 2:
                            message = "任务已经完成";
							 break;
                        case 0:
                            message = "查询任务失败";
                            break;
                        case -1:
                            message = "任务不存在";
                            break;
                        case -2:
                            message = "积分少于400";
                            break;
                        case -3:
                            message = "扣除积分失败";
                            break;
                        case -4:
                            message = "任务标记完成时失败（积分已扣除）";
                            break;
                        case -5:
                            message = "查询积分失败";
                            break;
                        case -6:
                            message = "登录失败";
                            break;
                        case -7:
                            message = "对不起操作失败，IP授权错误";
                            break;
                    }
                    if (error) {
                        popRef.alert({
                            'title': title,
                            'message': message,
                            'width': 310,
							'height':150
                        });
                    }
                    else {
                        popRef.succeedInfo({
                            'title': title,
                            'message': message,
                            'width': 310,
							'height':150
                        });
                    }
                }
            })
        })
    },
    qrinit: function(){
        $('#btnsapceticket').click(function(){
            if ($('#spacecode').val().trim() == null || $('#spacecode').val().trim() == '') {
                var title = '温馨提示';
                var mess = '请输入空间券密码!';
                popRef.alert({
                    'title': title,
                    'message': mess
                });
                $('#spacecode').focus();
                return false;
            }
            if ($('#txtspace').val().trim() == null || $('#txtspace').val().trim() == '') {
                var title = '温馨提示';
                var mess = "请输入验证码!";
                popRef.alert({
                    'title': title,
                    'message': mess
                });
                $('#txtspace').focus();
                return false;
            }
            $.ajax({
                type: 'post',
                data: {
                    spacecode: $('#spacecode').val(),
                    txtspace: $('#txtspace').val()
                },
                dataType: 'json',
                url: 'index.php?ac=space&op=usesapceticket',
                success: function(result){
                    if (result.state == 'codenull') {
                        var title = '充值失败';
                        var mess = '验证码为空!';
                        popRef.alert({
                            'title': title,
                            'message': mess
                        });
                    }
                    else 
                        if (result.state == 'codeerror') {
                            var title = '充值失败';
                            var mess = '验证码错误!';
                            popRef.alert({
                                'title': title,
                                'message': mess
                            });
                        }
                        else 
                            if (result.state == 'spaceticketnull') {
                                var title = '充值失败';
                                var mess = '空间券密码为空！!';
                                popRef.alert({
                                    'title': title,
                                    'message': mess
                                });
                            }
                            else 
                                if (result.state == 1) {
									var title = "温馨提示";
									var mess = "空间券充值成功！";
									popRef.succeedInfo({
										'title': title,
										'message': mess,
										'width': '200px;',
										handler:function(e)
										{
											window.location.reload();
										}
									});
                                }else
								{
                                    var title = '充值失败';
                                    var mess = '空间券密码不存在！';
                                    popRef.alert({
                                        'title': title,
                                        'message': mess
                                    })
								}
                }
            })
        });
        $('#btntaskticket').click(function(){
            if ($('#taskticket').val().trim() == null || $('#taskticket').val().trim() == '') {
                var title = '温馨提示';
                var mess = '请输入任务加速券密码!';
                popRef.alert({
                    'title': title,
                    'message': mess
                });
                $('#taskticket').focus();
                return false;
            }
            if ($('#txttask').val().trim() == null || $('#txttask').val().trim() == '') {
                var title = '温馨提示';
                var mess = "请输入验证码!";
                popRef.alert({
                    'title': title,
                    'message': mess
                });
                $('#txttask').focus();
                return false;
            }
            $.ajax({
                type: 'post',
                data: {
                    taskticket: $('#taskticket').val(),
                    code: $('#txttask').val()
                },
                dataType: 'json',
                url: 'index.php?ac=space&op=usetaskticket',
                success: function(res){
					switch(res.result)
					{
						case 'ok':
							title = "温馨提示";
							mess = "任务券充值成功！增加空间"+res.space;
							popRef.succeedInfo({
								'title': title,
								'message': mess,
								'width': '200px;',
								handler:function(e)
								{
									window.location.reload();
								}
							});
							break;
						case 'fail':
							switch(res.reason)
							{
								case 'codeerror':
									var title = '充值失败';
									var mess = '验证码错误!';
									popRef.alert({
										'title': title,
										'message': mess
									});
									break;
								case 'codenull':
									var title = '充值失败';
									var mess = '验证码为空!';
									popRef.alert({
										'title': title,
										'message': mess
									});
									break;
								case 'taskticketnull':
									var title = '充值失败';
									var mess = '任务券密码为空！!';
									popRef.alert({
										'title': title,
										'message': mess
									});
									break;
								case 'notExists':
									var title = '充值失败';
                                    var mess = '任务券密码不存在！';
                                    popRef.alert({
                                        'title': title,
                                        'message': mess
                                    });
									break;
								case 'expired':
									var title = '充值失败';
									var mess = '此任务券已过期！';
									popRef.alert({
										'title': title,
										'message': mess
									});
									break;
								case 'used':
								    var title = '充值失败';
									var mess = '此任务券已使用过！';
									popRef.alert({
										'title': title,
										'message': mess
									});	
									break;
							}
							break;
					}
                }
            })
        });
        $('#spacechange').click(function(){
			window.setTimeout(function(){
				$('#spi').attr('src', 'index.php?ac=checkcode&t=' + (new Date().getTime()));
			},0);
        });
        $('#taskchange').click(function(){
			window.setTimeout(function(){
				$('#tsi').attr('src', 'index.php?ac=checkcode&t=' + (new Date().getTime()));
			},0);
		});
    },
    spinit: function(web){
        var tt = '邀请注册的文字说明!';
        var title = encodeURIComponent(tt);
        var url = encodeURIComponent($('#URL').attr('href'));
        if ('sohu' == web) {
            var d = "http://bai.sohu.com/share/blank/addbutton.do?from=tudou&link=" + url + "&title=" + title;
        }
        else 
            if ('douban' == web) {
                var d = "http://www.douban.com/recommend/?url=" + url + "&title=" + title;
            }
            else 
                if ('kaixin' == web) {
                    var d = "http://www.kaixin001.com/repaste/share.php?rtitle=" + title + "&rurl=" + url + "&rcontent=" + encodeURIComponent(tt);
                }
                else 
                    if ('xiaonei' == web) {
                        var d = "http://share.xiaonei.com/share/buttonshare.do?link=" + url + "&title=" + title;
                    }
                    else 
                        if ('sina' == web) {
                            var d = 'http://v.t.sina.com.cn/share/share.php?title=' + title + '&url=' + url + '&rcontent=';
                        }
                        else 
                            if ('qq' == web) {
                                var d = 'http://v.t.qq.com/share/share.php?title=' + title + '&url=' + url;
                            }
                            else 
                                if ('qzone' == web) {
                                    var d = 'http://www.jiathis.com/send/send.php/?webid=qzone&title=' + title + '&url=' + url;
                                }
                                else {
                                    return false;
                                }
        if (d) {
            if (!window.open(d)) {
                location.href = d
            }
        }
    }
}
