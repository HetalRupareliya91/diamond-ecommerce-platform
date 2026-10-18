import { NavLink, Outlet } from 'react-router-dom';

const menuModules = import.meta.glob('../config/menu/*.js', { eager: true });
const menu = Object.values(menuModules)
  .map((mod) => mod.default)
  .filter(Boolean)
  .sort((a, b) => a.order - b.order);

const groups = menu.reduce((acc, item) => {
  (acc[item.group] = acc[item.group] || []).push(item);
  return acc;
}, {});

export default function Layout() {
  return (
    <div className="app-shell">
      <aside className="sidebar">
        <NavLink to="/" className="brand">Diamond Store</NavLink>
        {Object.entries(groups).map(([group, items]) => (
          <nav key={group} className="nav-group">
            <h4>{group}</h4>
            {items.map((item) => (
              <NavLink key={item.path} to={item.path}>{item.label}</NavLink>
            ))}
          </nav>
        ))}
      </aside>
      <main className="content">
        <Outlet />
      </main>
    </div>
  );
}
