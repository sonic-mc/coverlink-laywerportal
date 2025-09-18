@extends('layouts.portal')

@section('title', 'Messages')
@section('page-title', 'Messages')

@section('content')

<div style="display:flex; height:600px; border:1px solid #ddd; border-radius:8px; overflow:hidden;">

    <!-- Left: Case List -->
    <div style="width:30%; border-right:1px solid #ddd; overflow-y:auto; background:#f9fafb;">
        <h3 style="padding:15px; border-bottom:1px solid #ddd;">Cases</h3>
        <ul style="list-style:none; padding:0; margin:0;">
            <li style="padding:10px 15px; border-bottom:1px solid #eee; cursor:pointer; background:#fff; margin:10px;">
                <strong>Jane Doe</strong><br>
                <span style="font-size:12px; color:#555;">Last: Can you update me on my claim?</span>
            </li>
            <li style="padding:10px 15px; border-bottom:1px solid #eee; cursor:pointer; background:#fff; margin:10px;">
                <strong>John Smith</strong><br>
                <span style="font-size:12px; color:#555;">Last: Documents uploaded</span>
            </li>
        </ul>
    </div>

    <!-- Right: Chat Window -->
    <div style="flex:1; display:flex; flex-direction:column; background:#fff;">
        <!-- Chat Header -->
        <div style="padding:15px; border-bottom:1px solid #ddd; display:flex; justify-content:space-between; align-items:center;">
            <h3>Jane Doe</h3>
            <button style="padding:5px 10px; border:none; background:#2563eb; color:white; border-radius:4px;" onclick="markRead()">Mark as Read</button>
        </div>

        <!-- Chat Messages -->
        <div id="chatMessages" style="flex:1; padding:15px; overflow-y:auto; display:flex; flex-direction:column; gap:10px;">
            <div style="align-self:flex-start; background:#f3f4f6; padding:10px 15px; border-radius:12px; max-width:70%;">
                Hello, I have submitted my claim yesterday.
                <div style="font-size:10px; color:#555; text-align:right;">10:05 AM</div>
            </div>
            <div style="align-self:flex-end; background:#2563eb; color:white; padding:10px 15px; border-radius:12px; max-width:70%;">
                Thanks, Jane. We are reviewing it.
                <div style="font-size:10px; color:#e0e7ff; text-align:right;">10:07 AM</div>
            </div>
        </div>

        <!-- Input Box -->
        <div style="padding:10px; border-top:1px solid #ddd; display:flex; gap:10px;">
            <input type="text" id="chatInput" placeholder="Type a message..." style="flex:1; padding:10px; border:1px solid #ccc; border-radius:6px;">
            <input type="file" id="fileInput" style="display:none;">
            <button onclick="document.getElementById('fileInput').click()" style="padding:0 15px; border:none; background:#10b981; color:white; border-radius:6px;">📎</button>
            <button onclick="sendMessage()" style="padding:10px 20px; border:none; background:#2563eb; color:white; border-radius:6px;">Send</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function sendMessage() {
        const input = document.getElementById('chatInput');
        const msg = input.value.trim();
        if(msg === '') return;

        const msgDiv = document.createElement('div');
        msgDiv.style.alignSelf = 'flex-end';
        msgDiv.style.background = '#2563eb';
        msgDiv.style.color = 'white';
        msgDiv.style.padding = '10px 15px';
        msgDiv.style.borderRadius = '12px';
        msgDiv.style.maxWidth = '70%';
        msgDiv.style.marginBottom = '5px';

        msgDiv.innerHTML = `${msg}<div style="font-size:10px; color:#e0e7ff; text-align:right;">Now</div>`;

        document.getElementById('chatMessages').appendChild(msgDiv);
        input.value = '';
        document.getElementById('chatMessages').scrollTop = document.getElementById('chatMessages').scrollHeight;
    }

    function markRead() {
        alert('This conversation has been marked as read.');
    }
</script>
@endsection
