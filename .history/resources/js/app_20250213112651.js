import './bootstrap';
Echo.channel('talk-proposals')
    .listen('TalkProposalSubmitted', (e) => {
        console.log('New talk proposal submitted:', e.talkProposal);
        // Update the UI accordingly, e.g., append to a list
    });