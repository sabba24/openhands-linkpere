import { useEffect, useState } from 'react'
import axios from 'axios'
export default function AdminAlgorithmPage() {
  const [cfg, setCfg] = useState({})
  const [form, setForm] = useState({engagement_weight:'', view_boost_multiplier:'', ranking_formula:''})
  useEffect(() => {
    axios.get('/api/admin/algorithm/config').then(r=>{
      setCfg(r.data||{})
      setForm({
        engagement_weight: r.data.engagement_weight+'' || '',
        view_boost_multiplier: r.data.view_boost_multiplier+'' || '',
        ranking_formula: r.data.ranking_formula || ''
      })
    })
  },[])
  const submit = (e) => {
    e.preventDefault()
    axios.post('/api/admin/algorithm/config', form).then(r=>setCfg(r.data))
  }
  const input = (k) => (e) => setForm(f=>({...f, [k]:e.target.value}))
  return <div style={{padding:24}}>
    <h2>Algorithm Control</h2>
    <form onSubmit={submit}>
      <label>Engagement Weight <input value={form.engagement_weight} onChange={input('engagement_weight')} /></label><br/>
      <label>View Boost Multiplier <input value={form.view_boost_multiplier} onChange={input('view_boost_multiplier')} /></label><br/>
      <label>Ranking Formula <input value={form.ranking_formula} onChange={input('ranking_formula')} /></label><br/>
      <button type="submit">Update Algorithm</button>
    </form>
    <h3>Current</h3>
    <ul>
      <li>Engagement Weight: {cfg.engagement_weight}</li>
      <li>View Boost Multiplier: {cfg.view_boost_multiplier}</li>
      <li>Ranking Formula: {cfg.ranking_formula}</li>
    </ul>
  </div>
}
