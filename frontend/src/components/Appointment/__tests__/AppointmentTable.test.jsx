import { render, screen } from '@testing-library/react';
import AppointmentTable from '../AppointmentTable';

describe('AppointmentTable', () => {
  it('renders an empty state', () => {
    render(<AppointmentTable items={[]} />);
    expect(screen.getByText(/no appointments found/i)).toBeInTheDocument();
  });

  it('renders a row per item', () => {
    const items = [{ id: 1, name: 'First' }, { id: 2, name: 'Second' }];
    render(<AppointmentTable items={items} />);
    expect(screen.getByText('First')).toBeInTheDocument();
    expect(screen.getByText('Second')).toBeInTheDocument();
  });
});
