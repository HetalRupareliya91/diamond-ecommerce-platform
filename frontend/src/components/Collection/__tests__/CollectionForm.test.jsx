import { fireEvent, render, screen } from '@testing-library/react';
import CollectionForm from '../CollectionForm';

describe('CollectionForm', () => {
  it('submits entered values', () => {
    const onSubmit = vi.fn();
    render(<CollectionForm onSubmit={onSubmit} />);

    fireEvent.change(screen.getByLabelText('Name'), { target: { value: 'Sample' } });
    fireEvent.click(screen.getByRole('button', { name: /save/i }));

    expect(onSubmit).toHaveBeenCalledWith(expect.objectContaining({ name: 'Sample' }));
  });

  it('shows validation errors', () => {
    render(<CollectionForm onSubmit={() => {}} errors={{ name: ['The name field is required.'] }} />);
    expect(screen.getByText('The name field is required.')).toBeInTheDocument();
  });
});
