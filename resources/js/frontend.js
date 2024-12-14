function formatDateTime(dateTimeString) {
    const options = {
        year: 'numeric',
        month: 'short',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit'
    }
    const formatedDateTime = new Intl.DateTimeFormat('en-Us', options).format(new Date(dateTimeString));
    return formatedDateTime;
}

function scrollTobottom() {
    mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"));
}

window.Echo.private('message.'+ USER.id).listen(
    "MessageEvent",
    (e) => {
        console.log(e);
        let mainChatBox = $('.wsus__chat_area_body');
        if(mainChatBox.attr('data-inbox') == e.sender_id) {
            var message = `<div class="wsus__chat_single">
                <div class="wsus__chat_single_img">
                    <img src="${e.sender_image}"
                        alt="user" class="img-fluid">
                </div>
                <div class="wsus__chat_single_text">
                    <p>${e.message}</p>
                    <span>${formatDateTime(e.date_time)}</span>
                </div>
            </div>`
        }

        mainChatBox.append(message);
        scrollTobottom()


        // add notification circle in profile
        $('.chat-user-profile').each(function() {
            let profileUserId = $(this).data('id');
            if(profileUserId == e.sender_id) {
                $(this).find('.wsus_chat_list_img').addClass('msg-notification');
            }
        })
    }
)
