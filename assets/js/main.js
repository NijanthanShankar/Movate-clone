gsap.registerPlugin(ScrollTrigger);

var root = document.querySelector('[data-page-root]');

if (root) {
  var hero = document.querySelector('[data-hero]');
  var heroCopy = document.querySelector('[data-hero-copy]');
  var heroOrbit = document.querySelector('[data-hero-orbit]');
  var heroOrbitCore = document.querySelector('[data-hero-orbit-core]');
  var heroOrbitRing = document.querySelector('[data-hero-orbit-ring]');
  var nodes = document.querySelectorAll('.hero-orbit-node');
  var cards = document.querySelectorAll('.grid-card');
  var sections = document.querySelectorAll('[data-section]');
  var platformSection = document.querySelector('[data-section="platform"]');
  var chatMessages = document.querySelector('.ai-chat-messages');
  var chatForm = document.querySelector('[data-ai-chat-form]');
  var chatInput = document.querySelector('[data-ai-chat-input]');
  var providerToggle = document.querySelector('.ai-chat-provider-toggle');
  var aiChatShell = document.querySelector('.ai-chat');
  var chatShell = document.querySelector('.chat-shell');
  var chatClose = document.querySelector('[data-chat-close]');
  var launchForm = document.querySelector('[data-ai-launch-form]');
  var launchInput = document.querySelector('[data-ai-launch-input]');
  var suggestionButtons = document.querySelectorAll('[data-ai-suggestion]');

  if (hero && heroCopy && heroOrbit) {
    var tlHero = gsap.timeline({ defaults: { ease: 'power3.out', duration: 1.1 } });

    tlHero.from(heroCopy, {
      y: 40,
      opacity: 0
    }).from(
      '.hero-meta',
      {
        y: 14,
        opacity: 0
      },
      '-=0.8'
    ).from(
      '.hero-heading span',
      {
        yPercent: 120,
        opacity: 0,
        stagger: 0.08
      },
      '-=0.75'
    ).from(
      '.hero-body',
      {
        y: 24,
        opacity: 0
      },
      '-=0.7'
    ).from(
      '.hero-cta .btn-primary',
      {
        y: 20,
        opacity: 0
      },
      '-=0.6'
    ).from(
      '.hero-cta .btn-ghost',
      {
        y: 20,
        opacity: 0
      },
      '-=0.6'
    );

    gsap.from(heroOrbitCore, {
      opacity: 0,
      scale: 0.9,
      duration: 1.2,
      ease: 'power2.out',
      delay: 0.1
    });

    gsap.to(heroOrbitRing, {
      rotate: 360,
      ease: 'none',
      duration: 32,
      repeat: -1
    });

    if (heroOrbitCore) {
      gsap.to(heroOrbitCore, {
        scrollTrigger: {
          trigger: hero,
          start: 'top bottom',
          end: 'bottom top',
          scrub: true
        },
        yPercent: -10
      });
    }

    nodes.forEach(function (node, index) {
      gsap.from(node, {
        y: 20,
        opacity: 0,
        duration: 0.9,
        delay: 0.4 + index * 0.12,
        ease: 'power3.out'
      });
      gsap.to(node, {
        y: function () {
          return gsap.utils.random(-8, 8);
        },
        x: function () {
          return gsap.utils.random(-6, 6);
        },
        duration: gsap.utils.random(3.2, 5.2),
        ease: 'sine.inOut',
        yoyo: true,
        repeat: -1
      });
    });
  }

  cards.forEach(function (card) {
    gsap.from(card, {
      scrollTrigger: {
        trigger: card,
        start: 'top 82%'
      },
      y: 28,
      opacity: 0,
      duration: 0.9,
      ease: 'power3.out'
    });
  });

  if (platformSection) {
    var platformCards = platformSection.querySelectorAll('.grid-card');
    var platformTimeline = gsap.timeline({
      scrollTrigger: {
        trigger: platformSection,
        start: 'top top',
        end: '+=200%',
        pin: true,
        scrub: true
      }
    });
    platformCards.forEach(function (card, index) {
      platformTimeline.fromTo(
        card,
        {
          opacity: 0.1,
          y: 30
        },
        {
          opacity: 1,
          y: 0,
          duration: 0.9
        },
        index * 0.5
      );
    });
  }

  sections.forEach(function (section) {
    var kicker = section.querySelector('.section-kicker');
    var title = section.querySelector('.section-title');
    var copy = section.querySelector('.section-copy');

    if (!kicker || !title || !copy) {
      return;
    }

    var tl = gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: 'top 72%',
        toggleActions: 'play none none reverse'
      }
    });

    tl.from(kicker, {
      y: 16,
      opacity: 0,
      duration: 0.6
    }).from(
      title,
      {
        y: 22,
        opacity: 0,
        duration: 0.7
      },
      '-=0.3'
    ).from(
      copy,
      {
        y: 18,
        opacity: 0,
        duration: 0.6
      },
      '-=0.35'
    );
  });

  if (providerToggle) {
    providerToggle.addEventListener('click', function (event) {
      var target = event.target;
      if (!target.closest('button')) {
        return;
      }
      var button = target.closest('button');
      var provider = button.getAttribute('data-provider');
      providerToggle.querySelectorAll('button').forEach(function (btn) {
        btn.classList.toggle('is-active', btn === button);
      });
      if (chatForm) {
        chatForm.setAttribute('data-provider', provider);
      }
    });
  }

  if (aiChatShell) {
    gsap.from(aiChatShell, {
      scrollTrigger: {
        trigger: aiChatShell,
        start: 'top 78%'
      },
      y: 40,
      opacity: 0,
      scale: 0.96,
      duration: 0.9,
      ease: 'power3.out'
    });
  }

  function openChatFullscreen() {
    if (!chatShell) {
      return;
    }
    if (chatShell.classList.contains('ai-chat-fullscreen')) {
      return;
    }
    var chatSection = chatShell.closest('.chat-section');
    if (chatSection) {
      window.scrollTo({
        top: chatSection.offsetTop,
        behavior: 'smooth'
      });
    }
    chatShell.classList.add('ai-chat-fullscreen');
    gsap.fromTo(
      chatShell,
      { y: 40, opacity: 0.9, scale: 0.96 },
      { y: 0, opacity: 1, scale: 1, duration: 0.8, ease: 'power3.out' }
    );
  }

  function closeChatFullscreen() {
    if (!chatShell) {
      return;
    }
    if (!chatShell.classList.contains('ai-chat-fullscreen')) {
      return;
    }
    gsap.to(chatShell, {
      y: 40,
      opacity: 0.9,
      scale: 0.96,
      duration: 0.6,
      ease: 'power3.in',
      onComplete: function () {
        chatShell.classList.remove('ai-chat-fullscreen');
        gsap.set(chatShell, { clearProps: 'transform,opacity' });
      }
    });
  }

  function getChatMessagesElement() {
    if (chatMessages && chatMessages.parentNode) {
      return chatMessages;
    }
    chatMessages = document.querySelector('.ai-chat-messages');
    return chatMessages;
  }

  function createMessageElement(role, provider) {
    var el = document.createElement('div');
    el.className = 'ai-chat-message is-' + role;
    if (role === 'assistant' && provider) {
      var label = document.createElement('div');
      label.className = 'ai-chat-model-badge';
      label.textContent = getProviderLabel(provider);
      el.appendChild(label);
    }
    var body = document.createElement('div');
    body.className = 'ai-chat-message-body';
    el.appendChild(body);
    return el;
  }

  function getProviderLabel(provider) {
    if (provider === 'openai') {
      return 'OpenAI model';
    }
    if (provider === 'gemini') {
      return 'Gemini model';
    }
    return 'Hybrid engine';
  }

  function animateMessage(el) {
    gsap.fromTo(
      el,
      { y: 24, opacity: 0 },
      { y: 0, opacity: 1, duration: 0.45, ease: 'power3.out' }
    );
  }

  function appendMessage(role, content, provider) {
    var messagesEl = getChatMessagesElement();
    if (!messagesEl) {
      return;
    }
    var el = createMessageElement(role, provider);
    if (!el) {
      return;
    }
    var body = el.querySelector('.ai-chat-message-body');
    body.textContent = content;
    messagesEl.appendChild(el);
    messagesEl.scrollTop = messagesEl.scrollHeight;
    animateMessage(el);
  }

  function appendStreamedMessage(role, content, provider) {
    var messagesEl = getChatMessagesElement();
    if (!messagesEl) {
      return;
    }
    var el = createMessageElement(role, provider);
    if (!el) {
      return;
    }
    var body = el.querySelector('.ai-chat-message-body');
    messagesEl.appendChild(el);
    messagesEl.scrollTop = messagesEl.scrollHeight;
    animateMessage(el);
    var index = 0;
    var length = content.length;
    var step = function () {
      if (index >= length) {
        return;
      }
      var chunk = content.slice(index, index + 3);
      body.textContent += chunk;
      index += 3;
          messagesEl.scrollTop = messagesEl.scrollHeight;
      if (index < length) {
        requestAnimationFrame(step);
      }
    };
    requestAnimationFrame(step);
  }

  if (chatForm && chatInput && typeof MovateAI !== 'undefined') {
    chatForm.addEventListener('submit', function (event) {
      event.preventDefault();
      var value = chatInput.value.trim();
      if (!value) {
        return;
      }
      openChatFullscreen();
      var provider = chatForm.getAttribute('data-provider') || 'hybrid';
      appendMessage('user', value);
      chatInput.value = '';

      var pending = appendPending();

      fetch(MovateAI.restUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-WP-Nonce': MovateAI.nonce
        },
        body: JSON.stringify({
          provider: provider,
          messages: [
            {
              role: 'user',
              content: value
            }
          ]
        })
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (data) {
          if (pending && pending.parentNode) {
            pending.parentNode.removeChild(pending);
          }
          if (data && data.error) {
            appendMessage('assistant', data.error);
            return;
          }
          if (data && data.reply_parts && data.sources && data.sources.length) {
            data.reply_parts.forEach(function (part, index) {
              var source = data.sources[index] || data.provider;
              appendStreamedMessage('assistant', part, source);
            });
          } else if (data && data.reply) {
            appendStreamedMessage('assistant', data.reply, data.provider);
          } else {
            appendMessage('assistant', 'The engine could not generate a response.');
          }
        })
        .catch(function () {
          if (pending && pending.parentNode) {
            pending.parentNode.removeChild(pending);
          }
          appendMessage('assistant', 'Something went wrong while talking to the engine.');
        });
    });
  }

  if (chatClose) {
    chatClose.addEventListener('click', function () {
      closeChatFullscreen();
    });
  }

  if (
    launchForm &&
    launchInput &&
    chatForm &&
    chatInput &&
    typeof MovateAI !== 'undefined'
  ) {
    launchForm.addEventListener('submit', function (event) {
      event.preventDefault();
      var value = launchInput.value.trim();
      if (!value) {
        return;
      }
      chatInput.value = value;
      launchInput.blur();
      launchInput.value = '';
      openChatFullscreen();
      chatForm.dispatchEvent(new Event('submit', { bubbles: true, cancelable: true }));
    });
  }

  if (suggestionButtons.length && launchInput && launchForm) {
    suggestionButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        var value = button.getAttribute('data-ai-suggestion') || '';
        if (!value) {
          return;
        }
        launchInput.value = value;
        launchForm.dispatchEvent(new Event('submit', { bubbles: true, cancelable: true }));
      });
    });
  }

  function appendPending() {
    var messagesEl = getChatMessagesElement();
    if (!messagesEl) {
      return null;
    }
    var el = document.createElement('div');
    el.className = 'ai-chat-message is-assistant ai-chat-typing';
    var dotA = document.createElement('span');
    var dotB = document.createElement('span');
    var dotC = document.createElement('span');
    dotA.className = 'ai-chat-typing-dot';
    dotB.className = 'ai-chat-typing-dot';
    dotC.className = 'ai-chat-typing-dot';
    el.appendChild(dotA);
    el.appendChild(dotB);
    el.appendChild(dotC);
    messagesEl.appendChild(el);
    messagesEl.scrollTop = messagesEl.scrollHeight;
    return el;
  }
}
