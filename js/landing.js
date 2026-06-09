/**
 * OmniAI Nexus - Landing Website Interactive Logic
 * -------------------------------------------------------------
 * Powers the scroll header updates, connection brain network mappings,
 * mock desktop client file compilation loops, and toast popups.
 */

(function () {
  'use strict';

  // =========================================================================
  // 1. SCROLL HEADER STATE
  // =========================================================================
  function initScrollNavbar() {
    const header = document.querySelector('.navbar');
    if (!header) return;

    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  }

  // =========================================================================
  // 2. BRAIN NETWORK INTERACTIVE NODE HOVERING
  // =========================================================================
  const PLATFORM_DETAILS = {
    youtube: {
      title: 'YouTube Integration Hub',
      desc: 'Orchestrates video rendering pipelines, manages title completions, triggers subtitle alignments, and aggregates audience subscriber counts.',
      reach: 'High B2B & B2C',
      eng: '8.4% Average'
    },
    instagram: {
      title: 'Instagram Reels Automation',
      desc: 'Leverages Stable Diffusion and LLM copy generators to queue daily Reels. Auto-schedules layouts and publishes based on visual click forecasts.',
      reach: 'Extreme B2C',
      eng: '9.2% Average'
    },
    twitter: {
      title: 'X / Twitter Thread Manager',
      desc: 'Synthesizes long-form text articles into highly-engaging viral threads. Auto-engages mentions and registers trend indices for topic seeding.',
      reach: 'High Tech & Finance',
      eng: '6.5% Average'
    },
    linkedin: {
      title: 'LinkedIn B2B Command Node',
      desc: 'Generates industry-specific authority blogs and case study summaries. Auto-nurtures leads and updates connected sales CRM funnels.',
      reach: 'Premium Enterprise',
      eng: '5.4% Average'
    },
    tiktok: {
      title: 'TikTok Viral Pipeline',
      desc: 'Hooks trending audio indexes with custom script outlines. Spawns voice narrations and queues MP4 deliverables automatically.',
      reach: 'Massive Gen Z',
      eng: '11.2% Average'
    },
    facebook: {
      title: 'Facebook Ads Suite',
      desc: 'Orchestrates A/B ad creative testing. Evaluates image colors and copy angles to dynamically redistribute budget values to top performers.',
      reach: 'Wide Consumer demographic',
      eng: '7.1% Average'
    }
  };

  function initNetworkDiagram() {
    const nodes = document.querySelectorAll('.plat-node');
    const infoCard = document.getElementById('network-info-card');
    if (!infoCard) return;

    const detailIcon = infoCard.querySelector('.detail-icon');
    const detailTitle = infoCard.querySelector('h3');
    const detailDesc = infoCard.querySelector('p');
    const statsBlock = infoCard.querySelector('.detail-stats');
    const reachVal = document.getElementById('det-reach');
    const engVal = document.getElementById('det-eng');

    nodes.forEach(node => {
      node.addEventListener('mouseenter', () => {
        const plat = node.getAttribute('data-plat');
        const data = PLATFORM_DETAILS[plat];
        
        if (data) {
          // Add highlight class to line connecting to center brain
          const line = document.getElementById(`line-${plat}`);
          if (line) {
            line.style.stroke = 'var(--accent-primary)';
            line.style.strokeWidth = '3';
          }

          // Transition info card values
          detailIcon.className = `bx ${node.querySelector('i').className} detail-icon`;
          
          // Color platform specific styles dynamically
          detailIcon.style.color = getPlatformColor(plat);

          detailTitle.textContent = data.title;
          detailDesc.textContent = data.desc;
          
          reachVal.textContent = data.reach;
          engVal.textContent = data.eng;
          
          statsBlock.style.display = 'flex';
        }
      });

      node.addEventListener('mouseleave', () => {
        const plat = node.getAttribute('data-plat');
        const line = document.getElementById(`line-${plat}`);
        if (line) {
          line.style.stroke = 'rgba(99, 102, 241, 0.2)';
          line.style.strokeWidth = '2';
        }
      });
    });
  }

  function getPlatformColor(plat) {
    const colors = {
      youtube: '#FF0000',
      instagram: '#EC4899',
      twitter: '#FFFFFF',
      linkedin: '#0A66C2',
      tiktok: '#00F2FE',
      facebook: '#1877F2'
    };
    return colors[plat] || 'var(--accent-primary)';
  }

  // =========================================================================
  // 3. MOCK DESKTOP CLIENT DOWNLOAD (User Request Requirement)
  // =========================================================================
  function initDownloadManager() {
    const triggers = document.querySelectorAll('.btn-download-trigger');
    const modal = document.getElementById('download-modal');
    const closeBtn = document.getElementById('btn-close-download');
    const cancelBtn = document.getElementById('btn-cancel-download');
    const overlay = document.getElementById('download-modal-overlay');

    const downloadCards = document.querySelectorAll('.download-card');
    const progressBlock = document.getElementById('download-progress-section');
    const progressFill = document.getElementById('downloading-fill');
    const progressPercent = document.getElementById('downloading-percentage');
    const progressLabel = document.getElementById('downloading-os-label');

    // Open Download Modal
    triggers.forEach(trigger => {
      trigger.addEventListener('click', () => {
        modal.style.display = 'flex';
        // Reset states
        progressBlock.style.display = 'none';
        progressFill.style.width = '0%';
        progressPercent.textContent = '0%';
        downloadCards.forEach(c => c.style.opacity = '1');
      });
    });

    const hideModal = () => { modal.style.display = 'none'; };
    closeBtn.addEventListener('click', hideModal);
    cancelBtn.addEventListener('click', hideModal);
    overlay.addEventListener('click', hideModal);

    // Simulated OS downloads compile trigger
    downloadCards.forEach(card => {
      const btn = card.querySelector('.btn-os-download');
      btn.addEventListener('click', () => {
        const os = card.getAttribute('data-os');
        const osName = os === 'win' ? 'Windows' : os === 'mac' ? 'macOS' : 'Linux';
        const fileExt = os === 'win' ? '.exe' : os === 'mac' ? '.dmg' : '.AppImage';

        // Blur other choices
        downloadCards.forEach(c => {
          if (c !== card) c.style.opacity = '0.35';
        });

        progressBlock.style.display = 'block';
        progressFill.style.width = '0%';
        progressPercent.textContent = '0%';

        // Start compiling loop mockup
        let percentage = 0;
        const duration = 2500; // 2.5 seconds
        const stepTime = 50;
        const steps = duration / stepTime;
        const stepVal = 100 / steps;

        const downloadSteps = [
          'Handshaking secure repository node...',
          'Compiling digital certificate nodes...',
          'Bundling vector engines dependencies...',
          'Packaging client executable binary...',
          'Delivering application payload package...'
        ];

        const timer = setInterval(() => {
          percentage += stepVal;
          if (percentage >= 100) {
            percentage = 100;
            clearInterval(timer);
            
            // Finish compilation
            progressPercent.textContent = '100%';
            progressFill.style.width = '100%';
            progressLabel.textContent = `Nexus_Client_${osName}_v2.4.1${fileExt} downloaded.`;
            showToast(`Nexus Client compiled and saved successfully to downloads directory!`, 'success');
            
            setTimeout(() => {
              hideModal();
            }, 1000);
          } else {
            progressPercent.textContent = `${Math.floor(percentage)}%`;
            progressFill.style.width = `${percentage}%`;

            // Update label comments matching percentage range
            const stepIndex = Math.min(Math.floor(percentage / 20), downloadSteps.length - 1);
            progressLabel.textContent = downloadSteps[stepIndex];
          }
        }, stepTime);
      });
    });
  }

  // =========================================================================
  // 4. MOBILE NAVIGATION DRAWER
  // =========================================================================
  function initMobileMenu() {
    const toggleBtn = document.getElementById('menu-toggle-btn');
    const navLinks = document.querySelector('.nav-links');
    if (!toggleBtn || !navLinks) return;

    toggleBtn.addEventListener('click', () => {
      const isVisible = navLinks.style.display === 'flex';
      navLinks.style.display = isVisible ? 'none' : 'flex';
      navLinks.style.flexDirection = 'column';
      navLinks.style.position = 'absolute';
      navLinks.style.top = '80px';
      navLinks.style.left = '0';
      navLinks.style.right = '0';
      navLinks.style.backgroundColor = 'var(--bg-secondary)';
      navLinks.style.padding = '24px';
      navLinks.style.borderBottom = '1px solid var(--border)';
      toggleBtn.querySelector('i').className = isVisible ? 'bx bx-menu' : 'bx bx-x';
    });
  }

  // =========================================================================
  // 5. TOAST MESSAGE CREATOR
  // =========================================================================
  function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    const icon = type === 'success' ? 'bx-check-circle' : 'bx-info-circle';

    toast.innerHTML = `
      <i class="bx ${icon}"></i>
      <span>${message}</span>
      <button class="toast-close" onclick="this.parentElement.remove()"><i class="bx bx-x"></i></button>
    `;

    container.appendChild(toast);

    setTimeout(() => {
      if (toast.parentElement) {
        toast.classList.add('toast-exit');
        setTimeout(() => { toast.remove(); }, 300);
      }
    }, 4000);
  }

  // =========================================================================
  // 6. INITIALIZATION BINDINGS
  // =========================================================================
  document.addEventListener('DOMContentLoaded', () => {
    initScrollNavbar();
    initNetworkDiagram();
    initDownloadManager();
    initMobileMenu();
  });
})();
