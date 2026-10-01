const csrf = () => document.querySelector('meta[name="csrf-token"]')?.content || '';
export async function api(url, options = {}) {
  const headers = { Accept:'application/json', 'X-CSRF-TOKEN':csrf(), ...(options.body instanceof FormData ? {} : {'Content-Type':'application/json'}), ...(options.headers||{}) };
  const response = await fetch(url, { credentials:'same-origin', ...options, headers });
  const data = await response.json().catch(()=>({message:'Respons server tidak valid'}));
  if (!response.ok) throw new Error(data.message || Object.values(data.errors||{}).flat().join(' ') || `HTTP ${response.status}`);
  return data;
}
